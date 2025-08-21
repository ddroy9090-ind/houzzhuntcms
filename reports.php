<?php include 'includes/auth.php'; ?>
<?php include 'includes/common-header.php'; ?>
<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">Reports</h4>
          </div>
        </div>
      </div>
      <?php include 'config.php';
        $start = $_GET['start'] ?? '';
        $end = $_GET['end'] ?? '';
        $where = '';
        if ($start && $end) {
          $where = "WHERE created_at BETWEEN '". $conn->real_escape_string($start) ." 00:00:00' AND '".$conn->real_escape_string($end)." 23:59:59'";
        }
        $sql = "SELECT partner, project, COUNT(*) AS leads, SUM(CASE WHEN status='Closed' THEN 1 ELSE 0 END) AS closed FROM leads $where GROUP BY partner, project";
        $report = $conn->query($sql);
        $leaderSql = "SELECT partner, SUM(CASE WHEN status='Closed' THEN 1 ELSE 0 END) AS closed FROM leads $where GROUP BY partner ORDER BY closed DESC";
        $leaders = $conn->query($leaderSql);
      ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title mb-0">Sales Performance</h4>
            </div>
            <div class="card-body">
              <form class="row g-3 mb-3">
                <div class="col-auto">
                  <input type="date" class="form-control" name="start" value="<?php echo htmlspecialchars($start); ?>">
                </div>
                <div class="col-auto">
                  <input type="date" class="form-control" name="end" value="<?php echo htmlspecialchars($end); ?>">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary">Filter</button>
                </div>
              </form>
              <div class="table-responsive">
                <table class="table align-middle table-nowrap">
                  <thead class="table-light">
                    <tr>
                      <th>Partner</th>
                      <th>Project</th>
                      <th>Leads</th>
                      <th>Closed</th>
                      <th>Conversion %</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($row = $report->fetch_assoc()):
                      $rate = $row['leads'] ? round(($row['closed'] / $row['leads']) * 100, 2) : 0; ?>
                    <tr>
                      <td><?php echo htmlspecialchars($row['partner']); ?></td>
                      <td><?php echo htmlspecialchars($row['project']); ?></td>
                      <td><?php echo $row['leads']; ?></td>
                      <td><?php echo $row['closed']; ?></td>
                      <td><?php echo $rate; ?>%</td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title mb-0">Leaderboard</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-middle table-nowrap">
                  <thead class="table-light">
                    <tr>
                      <th>Rank</th>
                      <th>Partner</th>
                      <th>Closed Deals</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $rank = 1; while($row = $leaders->fetch_assoc()): ?>
                    <tr>
                      <td><?php echo $rank++; ?></td>
                      <td><?php echo htmlspecialchars($row['partner']); ?></td>
                      <td><?php echo $row['closed']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/common-footer.php'; ?>

<?php
include 'config.php';
$leads = $conn->query("SELECT * FROM leads ORDER BY created_at DESC");
while ($lead = $leads->fetch_assoc()):
?>
<tr>
    <td><?php echo htmlspecialchars($lead['name']); ?></td>
    <td><?php echo htmlspecialchars($lead['email']); ?></td>
    <td><?php echo htmlspecialchars($lead['phone']); ?></td>
    <td><?php echo htmlspecialchars($lead['partner']); ?></td>
    <td><?php echo htmlspecialchars($lead['project']); ?></td>
    <td>
        <select class="form-select form-select-sm status-select" data-id="<?php echo $lead['id']; ?>">
            <?php
            $statuses = ['Enquiry','Site Visit','Booking','Closed'];
            foreach ($statuses as $s):
                $sel = $lead['status'] === $s ? 'selected' : '';
                echo "<option value='$s' $sel>$s</option>";
            endforeach;
            ?>
        </select>
    </td>
    <td>
        <input type="date" class="form-control form-control-sm next-followup" data-id="<?php echo $lead['id']; ?>" value="<?php echo $lead['next_followup']; ?>" />
    </td>
</tr>
<?php endwhile; ?>

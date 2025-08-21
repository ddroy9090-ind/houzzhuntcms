<?php include 'includes/common-header.php' ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Leads</h4>
                        <div class="page-title-right">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#leadModal">Add Lead</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Lead Management</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Next Follow-up</th>
                                        </tr>
                                    </thead>
                                    <tbody id="leadTableBody">
                                        <?php include 'leads_list.php'; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'?>
</div>
<?php include 'includes/lead-modal.php'; ?>
<?php include 'includes/common-footer.php' ?>

<script>
function attachLeadEvents(){
  document.querySelectorAll('.status-select, .next-followup').forEach(function(el){
    el.addEventListener('change', function(){
      let row = this.closest('tr');
      let id = this.dataset.id;
      let status = row.querySelector('.status-select').value;
      let next = row.querySelector('.next-followup').value;
      fetch('update_lead_status.php', {
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:new URLSearchParams({id:id, status:status, next_followup:next})
      });
    });
  });
}
function refreshLeads(){
  fetch('leads_list.php').then(r=>r.text()).then(html=>{
    document.getElementById('leadTableBody').innerHTML = html;
    attachLeadEvents();
  });
}
attachLeadEvents();
</script>

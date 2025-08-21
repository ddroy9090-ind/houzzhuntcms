<!-- Add Lead Modal -->
<div class="modal fade" id="leadModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light p-3">
        <h5 class="modal-title">Add Lead</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="leadForm">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
          </div>
          <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone">
          </div>
          <div class="mb-3">
            <label class="form-label">Partner</label>
            <input type="text" class="form-control" name="partner">
          </div>
          <div class="mb-3">
            <label class="form-label">Project</label>
            <input type="text" class="form-control" name="project">
          </div>
          <div class="mb-3">
            <label class="form-label">Next Follow-up</label>
            <input type="date" class="form-control" name="next_followup">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="leadToastSuccess" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">Lead saved!</div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
  </div>
</div>
<div id="leadToastError" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">Error</div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
  </div>
</div>

<script>
document.getElementById('leadForm').addEventListener('submit', function(e){
  e.preventDefault();
  let form = this;
  fetch('add_lead.php', {method: 'POST', body: new FormData(form)})
    .then(res => res.json())
    .then(data => {
      if(data.status === 'success'){
        form.reset();
        let modalEl = document.getElementById('leadModal');
        let modal = bootstrap.Modal.getInstance(modalEl);
        if(modal) modal.hide();
        new bootstrap.Toast(document.getElementById('leadToastSuccess')).show();
        if(typeof refreshLeads === 'function'){ refreshLeads(); }
      }else{
        let t = document.getElementById('leadToastError');
        t.querySelector('.toast-body').innerText = data.message || 'Error';
        new bootstrap.Toast(t).show();
      }
    })
    .catch(() => {
      let t = document.getElementById('leadToastError');
      t.querySelector('.toast-body').innerText = 'Server error';
      new bootstrap.Toast(t).show();
    });
});
</script>

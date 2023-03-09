
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form" name="form">
        @csrf
      <div class="modal-body">
          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <label for="rank" class="col-form-label">Project Name</label>
            <input type="text" class="form-control" id="project_name" name="project_name">
            <small id="project_name_help" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="location" class="col-form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location">
            <small id="location_help" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="code" class="col-form-label">Start Date</label>
            <input type="text" class="form-control date " maxlength="10" id="date_start" name="date_start">
          </div>
          <div class="form-group">
            <label for="code" class="col-form-label">End Date</label>
            <input type="text" class="form-control date " maxlength="10" id="date_end" name="date_end">
          </div>

            <label for="code" class="col-form-label">Permanent</label>
            <input type="checkbox" id="permanent" name="permanent">




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>

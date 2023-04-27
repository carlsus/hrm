
<div class="modal fade" id="modal" tabindex="-1" data-mdb-container="#modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label for="employee_id">Employee</label>
            <select id='employee_id' name='employee_id' class="form-control select2">
              <option value=''>Select Employee</option>

              @foreach($employee['data'] as $employee)

                <option value="{{$employee->id}}"

                  >{{ $employee->first_name . ' ' . $employee->last_name}} </option>
              @endforeach
            </select>
            <small id="position_id_help" class="text-danger"></small>
        </div>
          <div class="form-group">
            <label for="amount" class="col-form-label">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount">
            <small id="amount_help" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="deduction_date" class="col-form-label">Deduction Date</label>
            <input type="text" class="form-control date " maxlength="10" id="deduction_date" name="deduction_date">
            <small id="deduction_date_help" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="status">status</label>
            <select id='status' name='status' class="form-control select2">
              <option value=''>Select Status</option>
              <option value='Pending'>Pending</option>
              <option value='Approved'>Approved</option>
            </select>
            <small id="status_help" class="text-danger"></small>
        </div>
          <div class="form-group">
            <label for="description" class="col-form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
            <small id="description_help" class="text-danger"></small>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>

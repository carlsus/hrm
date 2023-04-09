<div class="row">
    <div class="col-md-4">
        <label for="fathers_name">Father's Name</label>
        <input type="text" class="form-control" id="fathers_name" name="fathers_name" value="{{ $employee->fathers_name }}">
    </div>
    <div class="col-md-3">
        <label for="fathers_occupation">Occupation</label>
        <input type="text" class="form-control" id="fathers_occupation" name="fathers_occupation" value="{{ $employee->fathers_occupation }}">
    </div>
    <div class="col-md-5">
        <label for="fathers_address">Address</label>
        <input type="text" class="form-control" id="fathers_address" name="fathers_address" value="{{ $employee->fathers_address }}">
    </div>

    <div class="col-md-4">
        <label for="mothers_name">Mother's Name</label>
        <input type="text" class="form-control" id="mothers_name" name="mothers_name" value="{{ $employee->mothers_name }}">
    </div>
    <div class="col-md-3">
        <label for="mothers_occupation">Occupation</label>
        <input type="text" class="form-control" id="mothers_occupation" name="mothers_occupation" value="{{ $employee->mothers_occupation }}">
    </div>
    <div class="col-md-5">
        <label for="mothers_address">Address</label>
        <input type="text" class="form-control" id="mothers_address" name="mothers_address" value="{{ $employee->mothers_address }}">
    </div>
    <hr />
    <div class="col-md-4">
        <label for="spouse_first_name">Spouse First Name</label>
        <input type="text" class="form-control" id="spouse_first_name" name="spouse_first_name" value="{{ $employee->spouse_first_name }}">
    </div>
    <div class="col-md-4">
        <label for="spouse_middle_name">Spouse Middle Name</label>
        <input type="text" class="form-control" id="spouse_middle_name" name="spouse_middle_name" value="{{ $employee->spouse_middle_name }}">
    </div>
    <div class="col-md-4">
        <label for="spouse_last_name">Spouse Last Name</label>
        <input type="text" class="form-control" id="spouse_last_name" name="spouse_last_name" value="{{ $employee->spouse_last_name }}">
    </div>
    <div class="col-md-2">
        <label for="spouse_married_date">Date of Marriage</label>
        <input type="text" class="form-control date" id="spouse_married_date" name="spouse_married_date" value="{{ $employee->spouse_married_date ? date('d-M-Y', strtotime($employee->spouse_married_date))  : '' }}">
    </div>
    <div class="col-md-2">
        <label for="spouse_birth_date">Date of Birth</label>
        <input type="text" class="form-control date" id="spouse_birth_date" name="spouse_birth_date"value="{{ $employee->spouse_birth_date ? date('d-M-Y', strtotime($employee->spouse_birth_date))  : '' }}" >
    </div>
    <div class="col-md-8">
        <label for="spouse_birth_place">Place of Birth</label>
        <input type="text" class="form-control" id="spouse_birth_place" name="spouse_birth_place" value="{{ $employee->spouse_birth_place }}" >
    </div>
    <div class="col-md-4">
        <label for="spouse_occupation">Occupation</label>
        <input type="text" class="form-control" id="spouse_occupation" name="spouse_occupation" value="{{ $employee->spouse_occupation }}">
    </div>
</div>

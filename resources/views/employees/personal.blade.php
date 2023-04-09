<style>
    img {
      /* border: 0.5px solid #ddd; */
      /* border-radius: 4px; */
      padding: 1px;
      width: 140px;
      height: 140px;
      object-fit: contain;

}
</style>


<div class="container">
<div class="row flex-lg-nowrap">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="cardd">
          <div class="card-boddy">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      {{-- <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span> --}}
                      <img src="{{ asset('/storage/uploads/' .$employee->employee_no .'/' .$employee->image_path) }}" alt="" id="image_source" name="image_source">
                      <input type="file" name="image_path" id="image_path" accept="image/*" style="display: none" onchange="document.getElementById('image_source').src = window.URL.createObjectURL(this.files[0])">

                    </div>

                    <button type="button" class="btn btn-default btn-sm mt-1 btn-block" onclick="browse_image()">Browse</button>
                  </div>

                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">

                    <div class="container">
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="application_date">Date Hire</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    </div>
                                    <input type="text" class="form-control date " maxlength="10" id="hire_date" name="hire_date" value="{{ $employee->hire_date ? date('Y-m-d', strtotime($employee->hire_date))  : '' }}">
                                </div>
                                <small id="hire_date_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-8">
                                <label for="position_id">Position</label>
                                <select id='position_id' name='position_id' class="form-control select2">
                                  <option value='0'>Select Position</option>
                                  @foreach($position['data'] as $position)
                                    <option value="{{$position->id}}"

                                      >{{ $position->position }} </option>
                                  @endforeach
                                </select>
                                <small id="position_id_help" class="text-danger"></small>
                            </div>

                            <!-- -->
                            <div class="form-group col-md-4">
                                <label for="employment_status">Employment Status</label>
                                <select name="employment_status" id="employment_status" class="form-control">
                                    <option value="">Select Employment Status</option>
                                    <option value="Probationary">Probationary</option>
                                    <option value="Regular">Regular</option>
                                </select>
                                <small id="employment_status_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-8">
                                <label for="project_id">Project</label>
                                <select id='project_id' name='project_id' class="form-control select2">
                                  <option value='0'>Select Project</option>
                                  @foreach($project['data'] as $project)
                                    <option value="{{$project->id}}"

                                      >{{ $project->project_name }} </option>
                                  @endforeach
                                </select>
                                <small id="project_name_help" class="text-danger"></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="first_name">Firstname</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}">
                                <small id="first_name_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-4">
                                <label for="middle_name">Middlename</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $employee->middle_name }}">
                            </div>
                            <div class="col-md-4">
                                <label for="last_name">Lastname</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}">
                                <small id="last_name_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-12">
                                <label for="contact_address">Contact Address</label>
                                <input type="text" name="contact_address" id="contact_address" class="form-control" value="{{ $employee->contact_address }}" >
                                <small id="contact_address_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $employee->email }}">
                                <small id="email_help" class="text-danger"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $employee->telephone }}">
                            </div>
                          </div>


                        </div>
                      </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>


    </div>

  </div>
</div>
<script>
    function browse_image(){
        $('#image_path').trigger('click');
    }

    function change_image(a){

        $('#image_source').attr("src", a.src);
    }

</script>

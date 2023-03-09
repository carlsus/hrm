@extends('layouts.app')
@section('title', 'New Cash Advance')

@section('content')
{{-- @include('principals.form') --}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <form id="form" name="form" enctype="multipart/form-data">
                @csrf
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    <input type="hidden" name="id" id="id">
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
                      <label for="employee_id">Employee</label>
                      <select id='employee_id' name='employee_id' class="form-control select2">
                        <option value='0'>Select Employee</option>

                        @foreach($employee['data'] as $employee)

                          <option value="{{$employee->id}}"

                            >{{ $employee->first_name .' ' . $employee->last_name }} </option>
                        @endforeach
                      </select>
                      <small id="position_id_help" class="text-danger"></small>
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
                <!-- /.col -->
              </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary save">Save</button>
                </div>
            </form>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });

            $('.select2').select2({
                theme: 'bootstrap4'
            })
            //insert
            $('#form').submit(function(e){
                $('#form').find('input,small').removeClass('is-invalid').text('');
                event.preventDefault(e);
                var form=$('#form')[0];
                var formData=new FormData(form);

                $('.save').prop("disabled", true);

                $('.save').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
                );

                $.ajax({
                url: "{{ route('cashadvances.store') }}",
                type: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data)
                {
                    toastr.success(
                        'Record has been saved successfully',
                        'Success',
                        {
                            timeOut: 2000,
                            fadeOut: 2000,
                            onHidden: function () {
                                location.href='./';
                            }
                        }
                    );

                },
                complete:function(data){
                    $('.save').prop('disabled', false);
                    $('.save').html('Save');
                },
                error:function(err)
                    {
                        if(err.status===422){
                            var errors =$.parseJSON(err.responseText);
                            $.each(errors.errors, function(key, value){
                                $('#' +key).addClass('is-invalid');
                                $('#' +key).focus();
                                $('#'+key+"_help").text(value[0]);
                            })
                            $('.save').prop('disabled', false);
                            $('.save').html('Save');
                        }
                    }
                })
            })
        });
    </script>
@endsection

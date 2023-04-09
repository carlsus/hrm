@extends('layouts.app')
@section('title', 'Edit Crew Information')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <form id="form" name="form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $employee->id }}" class="form-control" >
                <input type="hidden" name="crew_no" id="crew_no" value="{{ $employee->crew_no }}" class="form-control" >
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    @include('employees.personal')
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="card w-100">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> --}}
                        <li class="nav-item"><a class="nav-link active" href="#family-background" data-toggle="tab">Family Background</a></li>
                        <li class="nav-item"><a class="nav-link" href="#permanent-address" data-toggle="tab">Permanent Address</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="#accountability" data-toggle="tab">Accountability</a></li> --}}

                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">

                        <div class="active tab-pane" id="family-background">
                            @include('employees.family_background')
                        </div>
                        <div class=" tab-pane" id="permanent-address">
                            @include('employees.permanent_address')
                        </div>

                        {{-- <div class="tab-pane" id="accountability">
                            @include('employees.accountability')
                        </div> --}}

                      </div>
                        </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" href="{{ route('employees.index') }}">Back</a>
                <button type="submit" class="btn btn-primary" id="Save">Save</button>
                </div>
            </form>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
    var table;
        $(document).ready(function(){

            $('.date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            });

            $('.select2').select2({
                theme: 'bootstrap4'
            })


            var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('allPositions') }}",
            columns: [
                {data: 'position', name: 'position'},
                {data: 'options', name: 'options', orderable: false, searchable: false}
            ],

    });



            $('#form').submit(function(e){
                event.preventDefault(e);
                var form=$('#form')[0];
                var formData=new FormData(form);


                $.ajax({
                url: "{{ route('employees.update') }}",
                type: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data)
                {
                    toastr.success(
                        'Information  updated successfully',
                        'Update Success',
                        {
                            timeOut: 2000,
                            fadeOut: 2000,
                            onHidden: function () {
                                location.href='/employees';
                            }
                        }
                        );
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
                        }
                    }
                })
            })


        });
    </script>
@endsection

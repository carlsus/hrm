@extends('layouts.app')
@section('title', 'Applicant Information')
@section('styles')
<style scoped>
    img {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 5px;
      width: 180px;
      height: 235px;
      object-fit: contain;
}
</style>
@endsection
@section('content')

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

                        <div class="tab-pane" id="accountability">
                            {{-- @include('employees.accountability') --}}
                        </div>
                        <div class="tab-pane" id="uniforms">

                        </div>
                        <div class="tab-pane" id="govt-info">

                        </div>
                        <div class="tab-pane" id="ph-info">

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
                <a class="btn btn-secondary" href="{{ route('employees.index',$crew->id) }}">Back</a>
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


                $.ajax({
                url: "{{ route('employees.store') }}",
                type: 'POST',
                data:formData,
                contentType:false,
                processData:false,
                success:function(data)
                {
                    form.reset();
                    toastr.success('Successfully saved.');
                    window.setTimeout(function() {
                        window.location.href = '/employees';
                    }, 5000);
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

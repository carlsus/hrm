@extends('layouts.portal')
@section('title', 'Time Attendance')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Time Attendance</h3>
          </div>
          <!-- /.card-header -->
          @include('portal.form')
          <div class="card-body">

            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Date</th>
                <th>In AM</th>
                <th>Out AM</th>
                <th>In PM</th>
                <th>Out PM</th>

              </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

@endsection
@section('scripts')
<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employeeAttendances') }}",
        columns: [
            {
                data: 'date_created',
                render: function (data) {
                    return moment(data).format('MMM D YYYY');
                }
            },
            {
                data: 'in_am',
                render: function (data) {
                    return moment(data).format('hh:mm a');
                }
            },
            {
                data: 'out_am',
                render: function (data) {
                    return moment(data).format('hh:mm a');
                }
            },
            {
                data: 'in_pm',
                render: function (data) {
                    return moment(data).format('hh:mm a');
                }
            },
            {
                data: 'out_pm',
                render: function (data) {
                    return moment(data).format('hh:mm a');
                }
            },
        ],

        dom: "lBtipr",
            buttons: {
            buttons: [
                {
                text: "Submit Time",
                    action: function(e, dt, node, config) {
                        $('#modal .modal-title').html('New');
                        $('#form')[0].reset();
                        $('#form').find('input, select,small').removeClass('is-invalid').text('');
                        $('#modal').modal('show');
                    }
                }
            ],
            dom: {
                button: {
                tag: "button",
                className: "btn btn-default group-vertical"
                },
                buttonLiner: {
                tag: null
                }
            }
        },

        columnDefs: [
        //   { width: "15%", targets: 0 },
        //   { width: "15%", targets: 1 }
        ],
    });




    $('#form').submit(function (e) {
        e.preventDefault();
        $('#form').find('input,small').removeClass('is-invalid').text('');
        var url;
        if($('#id').val()===""){
          url="{{ route('timeattendances.store') }}";
        }else{
          url="{{ route('timeattendances.update') }}";
        }
        $.ajax({
          data: $('#form').serialize(),
          url: url,
          type: "POST",
          dataType: 'json',
          success: function (data) {
            $('#form').trigger("reset");
            $('#modal').modal('hide');
            table.draw();
            toastr.success(data.success);
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
      });
    });



  });
</script>
@endsection

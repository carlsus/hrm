@extends('layouts.app')
@section('title', 'Attendance Log')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Attendance Log</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Employee Name</th>
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
        lengthChange: false,
        ajax: "{{ route('allTimesAttendanceLog') }}",
        columns: [
            {data: 'employee.first_name', name: 'employee.first_name'},

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
            }
        ],


        columnDefs: [
          { width: "25%", targets: 0 },
          { width: "15%", targets: 1 },
          { width: "15%", targets: 2 },
          { width: "15%", targets: 3 },
          { width: "15%", targets: 4 },
          { width: "15%", targets: 5 }
        ],
        buttons: [
            {
                extend: 'csv',
                split: [ 'pdf', 'excel'],
            },
            'colvis'
        ]
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
    //edit
    $('.data-table').on('click', '.edit', function () {
      var id = $(this).data("id");
      $.get("{{ route('departments.index') }}" +'/' + id +'/edit', function (data) {
          $('form[name=form]')[0].reset();
          $('#form').find('input,small').removeClass('is-invalid').text('');
          $('#modal .modal-title').html('Edit');
          $('#modal').modal('show');
          $('#id').val(data.id);
          $('#department').val(data.department);

      });
    });
    //delete
    $('.data-table').on('click', '.delete', function () {

          var id = $(this).data("id");
          $confirm =confirm("Are You sure want to delete !");

          if($confirm == true ){
              $.ajax({
                  type: "DELETE",
                  url: "{{ route('departments.store') }}"+'/'+id,
                  success: function (data) {
                      table.draw();
                      toastr.error('Record successfully deleted');
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
              });
          }
    });

  });
</script>
@endsection

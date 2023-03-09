@extends('layouts.app')
@section('title', 'Employee List')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Employee List</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Employee No</th>
                <th>Employee Name</th>
                <th>Position</th>
                <th>Status</th>
                <th>Hire Date</th>
                <th width="80px"></th>
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

    var table;
    $(document).ready(function(e){
      table = $('.data-table').DataTable({
            destroy:true,
            processing: true,
            serverSide: true,
            "ajax":{
                     "url": "{{ url('allEmployees') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "employee_no" },
                { "data": "employee_name" },
                { "data": "position" },
                { "data": "employment_status" },
                {
                    'data': 'application+date',
                    'render': function (data) {
                        return moment(data).format("DD-MMM-YYYY");
                    }
                },
                { "data": "options" }
            ]	,

            dom: "lBtipr",
                buttons: {
                  buttons: [
                    {
                      text: "New Employee",
                      action: function(e, dt, node, config) {
                          location.href='./employees/create';
                      }
                    }
                  ],
                  dom: {
                    button: {
                      tag: "button",
                      className: "btn btn-default"
                    },
                    buttonLiner: {
                      tag: null
                    }
                  }
                }

        });


      //delete
      $('.data-table').on('click', '.delete', function () {
        var id = $(this).attr('data-id');
        $confirm = confirm("Are You sure want to delete !");
        if($confirm == true ){
            $.ajax({
                type: "DELETE",
                url: "{{ route('employees.store') }}"+'/'+id,
                success: function (data) {
                    table.ajax.reload();
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

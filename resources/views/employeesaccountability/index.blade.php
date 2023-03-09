@extends('layouts.app')
@section('title', 'Employee Accountability')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Employee Accountability</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                 <th>Employee Name</th>
                <th>Item</th>
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
        var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('employeeAccountability') }}",
        columns: [
            {data: 'employee', name: 'employee'},
            {data: 'item', name: 'item'},
            {data: 'options', name: 'options', orderable: false, searchable: false}
        ],
        dom: "lBtipr",
            buttons: {
            buttons: [
                {
                text: "Create New",
                    action: function(e, dt, node, config) {
                        location.href='./employeeaccountability/create';
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

          { width: "10%", targets: 2 }
        ],
    });


      //delete
      $('.data-table').on('click', '.delete', function () {
        var id = $(this).attr('data-id');
        $confirm = confirm("Are You sure want to delete !");
        if($confirm == true ){
            $.ajax({
                type: "DELETE",
                url: "{{ route('employeeaccountability.store') }}"+'/'+id,
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

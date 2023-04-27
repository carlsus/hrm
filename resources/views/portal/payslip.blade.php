@extends('layouts.portal')
@section('title', 'Payslip')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Payslip</h3>
          </div>
          <!-- /.card-header -->

          <div class="card-body">

            <table class="table table-bordered table-hover data-table w-100">
              <thead>
                <tr>
                    <th>From </th>
                    <th>To </th>
                    <th></th>
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
          ajax: "{{ route('myPayslips') }}",
          columns: [
              {data: 'date_start', name: 'date_start'},
              {data: 'date_end', name: 'date_end'},
              {data: 'options', name: 'options', orderable: false, searchable: false}
          ],

          dom: "lBtipr",
              buttons: {
              buttons: [
                  @can('employee-create')
                  {
                      text: "Create New",
                        action: function(e, dt, node, config) {
                            location.href='./payslips/create';
                        }
                  }
                  @endcan
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
            { width: "40%", targets: 0 },
            { width: "40%", targets: 1 }
          ],
      });

    });

  </script>
@endsection

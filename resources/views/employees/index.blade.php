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
            <table class="table table-bordered table-hover data-table w-100 display">
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
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->employee_no }}</td>
                        <td>{{ $employee->last_name . ',' . $employee->first_name }}</td>
                        <td>{{ $employee->position->position }}</td>
                        <td>{{ $employee->employment_status }}</td>
                        <td>{{ date('M-d-Y', strtotime($employee->hire_date)) }}</td>
                        <td width="80px">

                            @can('employee-edit')
                                <a href='{{ route('employees.edit',$employee->id) }}' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit'></a>
                            @endcan
                            @can('employee-delete')
                                <a href='javascript:void(0)' data-toggle='tooltip'  data-id='{{ $employee->id }}' title='Delete' class='btn btn-danger delete fas fa-trash'></a>
                            @endcan

                        </td>
                    </tr>
                @endforeach
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
$(document).ready(function() {
    $('.data-table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('.data-table thead');
    var table = $('.data-table').DataTable( {
        searching:true,
        responsive:true,
        scrollX: true,
        dom: "Bfrtip",
            buttons: {
            buttons: [
                'print',
                @can('employee-create')
                {
                    text: "Create New",
                      action: function(e, dt, node, config) {
                          location.href='./employees/create';
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
            orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();

            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },

    });





    $('.data-table').on('click', '.delete', function () {
        var id = $(this).attr('data-id');
        $confirm = confirm("Are You sure want to delete !");
        if($confirm == true ){
            $.ajax({
                type: "DELETE",
                url: "{{ route('employees.store') }}"+'/'+id,
                success: function (data) {
                    location.reload();
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

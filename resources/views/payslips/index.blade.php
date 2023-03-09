@extends('layouts.app')
@section('title', 'Projects')

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
            <div class="form-row align-items-center">
                <div class="col-auto">

                  <input type="text" class="form-control date " id="date_start" name="date_start" placeholder="From date">
                </div>
                <div class="col-auto">

                  <input type="text" class="form-control date" id="date_end" name="date_end" placeholder="To date">
                </div>

                <div class="col-auto mt-2">
                  <button type="submit" class="btn btn-primary mb-2" id="btnGenerate" name="btnGenerate">Generate</button>
                </div>
              </div>


            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Employee Name</th>
                <th>Deduction</th>
                <th>Gross</th>
                <th>Net Pay</th>

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
    $('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });

    // var table = $('.data-table').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     searching:false,
    //     "lengthChange": false,
    //      ajax: "{{ route('allProjects') }}",
    //     columns: [
    //         {data: 'project_name', name: 'project_name'},
    //         {data: 'location', name: 'location'},
    //         {data: 'options', name: 'options', orderable: false, searchable: false}
    //     ],

    //     // dom: "lBtipr",
    //     //     buttons: {
    //     //     buttons: [
    //     //         {
    //     //         text: "Create New",
    //     //             action: function(e, dt, node, config) {
    //     //                 $('#modal .modal-title').html('New');
    //     //                 $('#form')[0].reset();
    //     //                 $('#form').find('input,small').removeClass('is-invalid').text('');
    //     //                 $('#form').find('select').removeClass('is-invalid');
    //     //                 $('#modal').modal('show');
    //     //             }
    //     //         }
    //     //     ],
    //     //     dom: {
    //     //         button: {
    //     //         tag: "button",
    //     //         className: "btn btn-default group-vertical"
    //     //         },
    //     //         buttonLiner: {
    //     //         tag: null
    //     //         }
    //     //     }
    //     // },



    //     ],
    // });
    $('#btnGenerate').click(function(e){
        url="{{ route('getPayslips') }}";
        $('.data-table').DataTable({
            "destroy": true,
        processing: true,
        serverSide: true,
        searching:false,
        lengthChange: false,
        paging:false,
        "ajax": {
        type: 'get',
        url: url,
        'data': {
           date_start: $('#date_start').val(),
           date_end: $('#date_end').val(),


        }
    },
        columns: [
            {data: 'employee_name', name: 'employee_name'},
            {data: 'deduction', name: 'deduction'},
            {data: 'gross', name: 'gross'},
            {data: 'netpay', name: 'netpay'},

        ],




        } );
    })
    $('#form').submit(function (e) {
        e.preventDefault();
        $('#form').find('input,small').removeClass('is-invalid').text('');

        var url;
        if($('#id').val()===""){
          url="{{ route('projects.store') }}";
        }else{
          url="{{ route('projects.update') }}";
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
      $.get("{{ route('projects.index') }}" +'/' + id +'/edit', function (data) {
          $('form[name=form]')[0].reset();
          $('#form').find('input,small').removeClass('is-invalid').text('');

          $('#modal .modal-title').html('Edit Position');
          $('#modal').modal('show');
          $('#id').val(data.id);
          $('#project_name').val(data.project_name);
          $('#location').val(data.location);
          $('#date_start').val(data.date_start);
          $('#date_end').val(data.date_end);
          $('#permanent').val(data.permanent);

      });
    });
    //delete
    $('.data-table').on('click', '.delete', function () {

      var id = $(this).data("id");
      $confirm =confirm("Are You sure want to delete !");

      if($confirm == true ){
          $.ajax({
              type: "DELETE",
              url: "{{ route('positions.store') }}"+'/'+id,
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

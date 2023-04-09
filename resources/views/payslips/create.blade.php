@extends('layouts.app')
@section('title', 'New Payslip')

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

                      <div class="form-check form-check-inline">
                        <label for="date_start" class="form-check-label">Start Date</label>
                        <input type="text" class="form-control date " maxlength="10" id="date_start" name="date_start">
                      </div>
                      <div class="form-check form-check-inline">
                        <label for="date_end" class="form-check-label">End Date</label>
                        <input type="text" class="form-control date " maxlength="10" id="date_end" name="date_end">
                        <button  type="submit" class="btn btn-primary ml-2" id="btnGenerate" name="btnGenerate"> Generate</button>
                      </div>
                </div>
                <!-- /.col -->
              </div>
              <br>

              <table class="table table-bordered table-hover data-table w-100">
                <thead>
                <tr>
                  <th>Employee Name</th>
                  <th>Deduction</th>
                  <th>Cash Advance</th>
                  <th>Gross Pay</th>
                  <th>Net Pay</th>

                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>





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
       $(function () {
    $('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });
    $('#btnGenerate').click(function(e){
        e.preventDefault();

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
            {data: 'advance', name: 'advance'},
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
          url="{{ route('payslips.store') }}";
        }else{

        }
        $.ajax({
          data: $('#form').serialize(),
          url: url,
          type: "POST",
          dataType: 'json',
          success: function (data) {
            toastr.success(data.success);
            window.setTimeout(function() {
                        window.location.href = '/payslips';
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
      });
    });
    edit


  });

</script>
@endsection

@extends('layouts.app')
@section('title', 'Cash Advance')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Cash Advance</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @include('cashadvances.form')
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Employee</th>
                <th>Date</th>
                <th>Deduction Date</th>
                <th>Amount</th>
                <th>Description</th>
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
        ajax: "{{ route('allCashAdvances') }}",
        columns: [
            {data: 'employee', name: 'employee'},
            {data: 'date_created', name: 'date_created'},
            {data: 'deduction_date', name: 'deduction_date'},
            {data: 'amount', name: 'amount'},
            {data: 'description', name: 'description'},
            {data: 'options', name: 'options', orderable: false, searchable: false}
        ],
        dom: "lBtipr",
            buttons: {
            buttons: [
                {
                text: "Create New",
                    action: function(e, dt, node, config) {
                        location.href='./cashadvances/create';
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
          { width: "15%", targets: 0 },
          { width: "15%", targets: 1 },
          { width: "15%", targets: 2 },
          { width: "10%", targets: 5},
        ],
    });




    $('#form').submit(function (e) {
        e.preventDefault();
        $('#form').find('input,small').removeClass('is-invalid').text('');
        var url;
        if($('#id').val()===""){
          url="{{ route('cashadvances.store') }}";
        }else{
          url="{{ route('cashadvances.update') }}";
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
      $.get("{{ route('cashadvances.index') }}" +'/' + id +'/edit', function (data) {
          $('form[name=form]')[0].reset();
          $('#form').find('input,small').removeClass('is-invalid').text('');
          $('#modal .modal-title').html('Edit');
          $('#modal').modal('show');
          $('#id').val(data.id);
          $('#amount').val(data.amount);
          $('#deduction_date').val(data.deduction_date);
          $('#description').val(data.description);
          $('#status').val(data.status);


      });
    });
    //delete
    $('.data-table').on('click', '.delete', function () {

          var id = $(this).data("id");
          $confirm =confirm("Are You sure want to delete !");

          if($confirm == true ){
              $.ajax({
                  type: "DELETE",
                  url: "{{ route('cashadvances.store') }}"+'/'+id,
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

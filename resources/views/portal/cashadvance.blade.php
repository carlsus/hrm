@extends('layouts.portal')
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
            <table class="table table-bordered table-hover data-table w-100">
              <thead>
              <tr>
                <th>Deduction Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Description</th>
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
        ajax: "{{ route('myCashAdvance') }}",
        columns: [
            {data: 'deduction_date', name: 'deduction_date'},
            {data: 'amount', name: 'amount'},
            {data: 'status', name: 'status'},
            {data: 'description', name: 'description'}
        ]
    });




  });
</script>
@endsection

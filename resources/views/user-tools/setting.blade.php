@extends('template')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Users Setting</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="tableUser" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>No Induk</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Handphone</th>
              <th>Description</th>
              <th>Roles</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->


</div>
<!-- End of Content Wrapper -->
@endsection
@section('script')
  <script src="{{asset ("js/pages/user-tools/setting.js?v=".uniqid()."")}}"></script>
@endsection
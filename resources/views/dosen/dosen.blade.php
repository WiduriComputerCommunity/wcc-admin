@extends('template')
@section('content')
<!-- Content Wrapper -->
{{-- <div class="content-wrapper">
    <section class="content">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
      </div>



    </section>
</div> --}}
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  <p class="h5 mb-4 text-bold">Selamat Datang, {{ Auth::user()->nama }}</p>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Content Wrapper -->

@endsection
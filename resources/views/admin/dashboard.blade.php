@extends('admin.layouts.app')

@section('Head')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('storage/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('storage/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('storage/AdminLTE/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('storage/AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
@endsection

@section('title')
    Admin | Dashboard
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <!-- Left col -->
              <section class="col-lg-7 connectedSortable">
                <!-- List terakhir kali buku tamu -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Buku tamu yang baru masuk</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                    @foreach ($bukus as $buku)  
                      <!-- item -->
                      <li class="item">
                        <div class="product-img">
                        <i class="size-50 fas fa-book fa-2x"></i>
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title">{{$buku->asal}}
                            <span class="badge badge-info float-right">{{$buku->email}}</span></a>
                          <span class="product-description">
                          {{$buku->keperluan}}
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                    @endforeach
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{url('/admin/buku')}}" class="uppercase">Lihat semua buku tamu</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->

              </section>
              <!-- /.Left col -->
              <!-- right col-->
              <section class="col-lg-5 connectedSortable">

                <!-- Jumlah buku tamu -->
                <div class="card">
                  <div class="card-header border-0">
                    <h3 class="card-title">
                      <i class="fas fa-book"></i>
                      Buku Tamu
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                      <!-- button with a dropdown -->
                      <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body small-box bg-info">
                    <!-- small box -->
                    <div class="inner">
                      <p>Jumlah buku tamu :</p>
                      <h3>{{$jumlah_buku}}</h3>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{url('/admin/buku')}}" class="small-box-footer">Lihat buku tamu <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- Jumlah Agenda -->
                <div class="card">
                  <div class="card-header border-0">
                    <h3 class="card-title">
                      <i class="fas fa-edit"></i>
                      Agenda Sekolah
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                      <!-- button with a dropdown -->
                      <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body small-box bg-success">
                    <!-- small box -->
                    <div class="inner">
                      <p>Jumlah agenda sekolah :</p>
                      <h3>{{$jumlah_agenda}}</h3>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{url('/admin/agenda')}}" class="small-box-footer">Lihat agenda sekolah <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

              </section>
              <!-- /.right col -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('foot')
<!-- jQuery -->
<script src="{{ asset('storage/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('storage/AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('storage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('storage/AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('storage/AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('storage/AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('storage/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('storage/AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('storage/AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('storage/AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('storage/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('storage/AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('storage/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('storage/AdminLTE/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('storage/AdminLTE/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('storage/AdminLTE/dist/js/demo.js')}}"></script>
@endsection
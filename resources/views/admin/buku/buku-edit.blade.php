@extends('admin.layouts.app')

@section('Head')
@endsection

@section('title')
    Admin | Buku Tamu Sekolah
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Buku Tamu Sekolah</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
          @if(session()->has('msg'))
            <div class="alert alert-success">{{ session()->get('msg')}}</div>
          @endif
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-body">
                <form action="{{route('buku.update', $buku->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-3 row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Masukkan email di sini" value="{{$buku->email}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAsal" class="col-sm-2 col-form-label">Asal/Instansi</label>
                        <div class="col-sm-10">
                            <input type="text" name="asal" class="form-control" id="inputAsal" placeholder="Masukkan Asal/Instansi di sini" value="{{$buku->asal}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Masukkan Alamat di sini" value="{{$buku->alamat}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputKeperluan" class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="keperluan" id="inputKeperluan" rows="3" placeholder="Masukkan Keperluan di sini">{{$buku->keperluan}}</textarea>
                        </div>
                    </div>
                    <div align="right">
                        <input type="submit" class="btn btn-primary" href="#" role="button" value="Simpan">
                    </div>
                </form>
              </div>
              <!-- /.card -->
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
<!-- Bootstrap 4 -->
<script src="{{ asset('storage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('storage/AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('storage/AdminLTE/dist/js/demo.js')}}"></script>
<!-- page script -->
@endsection
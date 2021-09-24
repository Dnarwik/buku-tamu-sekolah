@extends('admin.layouts.app')

@section('Head')
@endsection

@section('title')
    Admin | Agenda Sekolah
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Agenda Sekolah</h1>
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
            <div class="card card-primary card-outline">
              <div class="card-body">
                <form action="{{route('agenda.update', $agenda->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-3 row">
                        <label for="inputJudul" class="col-sm-2 col-form-label">Judul Agenda</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul" class="form-control" id="inputJudul" placeholder="Masukkan judul agenda disini" value="{{$agenda->judul}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal Agenda</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal" class="form-control" id="inputTanggal" value="{{$agenda->tanggal}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputIsi" class="col-sm-2 col-form-label">Isi Agenda</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="isi" id="inputIsi" rows="3" placeholder="Masukkan isi agenda di sini">{{$agenda->isi}}</textarea>
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
@extends('admin.layouts.app')

@section('Head')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('storage/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('storage/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
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
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-agenda-tab" data-toggle="pill" href="#custom-tabs-two-agenda" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Daftar Buku Tamu Sekolah</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-tamupeserta-tab" data-toggle="pill" href="#custom-tabs-two-tamu" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Buat Buku Tamu Baru</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-agenda" role="tabpanel" aria-labelledby="custom-tabs-two-agenda-tab">
                    <!-- Table agenda-->
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Daftar Buku Tamu Sekolah</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Waktu Pengisian</th>
                              <th>Email</th>
                              <th>Asal/Instansi</th>
                              <th>Alamat</th>
                              <th>Keperluan</th>
                              <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bukus as $buku)
                            <tr>
                              <td>
                                  {{$buku->created_at}}
                              </td>
                              <td>
                                  {{$buku->email}}
                              </td>
                              <td>
                                  {{$buku->asal}}
                              </td>
                              <td>
                                  {{$buku->alamat}}
                              </td>
                              <td>
                                  {{\Illuminate\Support\Str::limit($buku->keperluan, 50, $end='...')}}
                              </td>
                              <td>
                                <a href="{{route('buku.edit', $buku->id)}}" type="button" class="btn btn-info">
                                    Edit
                                </a>
                                <form action="{{route('buku.delete', $buku->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                              </td>
                            </tr>
                            @endforeach
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <!-- /.Table agenda-->
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-tamu" role="tabpanel" aria-labelledby="custom-tabs-two-tamu-tab">
                    <!-- Table tamu-->
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Buat Buku Tamu Baru</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <form action="{{route('buku.insert')}}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Masukkan email di sini">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputAsal" class="col-sm-2 col-form-label">Asal/Instansi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="asal" class="form-control" id="inputAsal" placeholder="Masukkan Asal/Instansi di sini">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Masukkan Alamat di sini">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputKeperluan" class="col-sm-2 col-form-label">Keperluan</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" name="keperluan" id="inputKeperluan" rows="3" placeholder="Masukkan Keperluan di sini"></textarea>
                                </div>
                            </div>
                            <div align="right">
                            <input type="submit" class="btn btn-primary" href="#" role="button" value="Simpan">
                            </div>
                          </form>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <!-- /.Table tamu-->
                  </div>
                </div>
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
<!-- DataTables -->
<script src="{{ asset('storage/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('storage/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('storage/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('storage/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('storage/AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('storage/AdminLTE/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection
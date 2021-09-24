@extends('layouts.app')

@section('title')
 Buku tamu sekolah
@endsection

@section('content')
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
        <center><h2 id="agenda"><b>SELAMAT DATANG DI WEBSITE BUKU TAMU</b></h2></center>
    </div>
    <br><br>
    <div class="container p-4 pb-4 mb-4 pt-2 border rounded">
        <h4><center><b>AGENDA SEKOLAH</b></center></h4>
        <hr>
        <div class="row">
            @foreach ($agendas as $agenda)
                <div class="col-sm-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{$agenda->judul}}</h5>
                            <p class="fw-light">Tanggal : {{$agenda->tanggal}}</p>
                            <p class="card-text">
                            {{$agenda->isi}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
            <p id="buku"></p> 
        </div>
    </div>
    <br>
    <div class="container p-5 pb-4 mb-4 pt-2 border rounded">
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
            <h4><center><b>BUKU TAMU</b></center></h4> 
        </div>
        <hr>
        @if(session()->has('msg'))
            <div class="alert alert-success">{{ session()->get('msg')}}</div>
        @endif
        <form action="{{route('welcome.insert')}}" method="post">
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
@endsection
<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index(){
        $bukus = DB::table('buku')->get();
        return view('admin.buku.buku', ['bukus' => $bukus]);
    }

    //Tambah Buku
    public function insert(Request $request){
        DB::table('buku')->insert([
            'email' => $request->email,
            'asal' => $request->asal,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
        session()->flash('msg','Buku tamu berhasil dibuat!');
        return redirect()->back();
    }

    //Hapus Buku
    public function delete($id){
        DB::table('buku')->where('id',$id)->delete();
        session()->flash('msg','Buku tamu berhasil dihapus!');
        return redirect()->back();
    }

    //Halaman edit buku
    public function edit($id){
        $buku = DB::table('buku')->where('id', $id)->first();
        return view('admin.buku.buku-edit', ['buku' => $buku]);
    }

    //Edit buku
    public function update(Request $request,$id){
        DB::table('buku')->where('id', $id)->update([
            'email' => $request->email,
            'asal' => $request->asal,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
        session()->flash('msg','Buku tamu berhasil diedit!');
        return redirect(route('buku'));
    }
}

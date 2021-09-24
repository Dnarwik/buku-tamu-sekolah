<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(){
        $agendas = DB::table('agenda')->latest('created_at')->take(6)->get();
        return view('welcome', ['agendas' => $agendas]);
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
        session()->flash('msg','Buku tamu berhasil diisi. Silahkan tunggu kabar dari Kami!');
        return redirect(route('welcome'));
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    public function index(){
        $agendas = DB::table('agenda')->get();
        return view('admin.agenda.agenda', ['agendas' => $agendas]);
    }

    //Tambah Agenda
    public function insert(Request $request){
        DB::table('agenda')->insert([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
        session()->flash('msg','Agenda berhasil dibuat!');
        return redirect()->back();
    }

    //Hapus Agenda
    public function delete($id){
        DB::table('agenda')->where('id',$id)->delete();
        session()->flash('msg','Agenda berhasil dihapus!');
        return redirect()->back();
    }

    //Halaman edit agenda
    public function edit($id){
        $agenda = DB::table('agenda')->where('id', $id)->first();
        return view('admin.agenda.agenda-edit', ['agenda' => $agenda]);
    }

    //Edit agenda
    public function update(Request $request,$id){
        DB::table('agenda')->where('id', $id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);
        session()->flash('msg','Agenda berhasil diedit!');
        return redirect(route('agenda'));
    }
}

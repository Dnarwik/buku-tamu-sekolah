<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index(){
        $bukus = DB::table('buku')->latest('created_at')->take(6)->get();
        $jumlah_buku = DB::table('buku')->count();
        $jumlah_agenda = DB::table('agenda')->count();
        return view('admin.dashboard', ['bukus' => $bukus, 
                                        'jumlah_buku' => $jumlah_buku, 
                                        'jumlah_agenda' => $jumlah_agenda]);
    }
}

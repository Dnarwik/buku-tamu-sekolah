<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function __construct(){
        //Guest Middleware untuk otomatis ke halaman dashboard jika sudah login
        $this->middleware('guest:admin')->except('logout');
    }

    //Halaman Index
    public function index(){
        return view('admin.login');
    }

    //Fungsi Login Admin
    public function store(Request $request){
        //Validasi User Admin
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Login User Admin
        $credentials = $request->only('email','password');
        if(!Auth::guard('admin')->attempt($credentials)){
            return back()->withErrors([
                'message' => 'Email atau password salah!!'
            ]);
        }

        //session message
        session()->flash('msg','Kamu sudah login!!');

        //redirect
        return redirect('/admin');
    }

    //Fungsi Logout Admin
    public function logout(){
        //Logout User Admin
        auth()->guard('admin')->logout();

        //Session message
        session()->flash('msg','Kamu berhasil logout!!');

        //redirect
        return redirect('admin/login');
    }
}

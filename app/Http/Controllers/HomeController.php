<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DamageReport;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notComplete = DamageReport::whereNull('status_laporan')->get();
        // dd($notComplete);
        // return view('home');
        return view('home', compact('notComplete'));
        
    }

    public function logout(){
        Auth::logout();
        $data=[
            'alert' => 'danger',
            'message' => 'Anda Telah Log Keluar'
        ];
        return redirect()->route('login')->with('noti', $data);
    }
}

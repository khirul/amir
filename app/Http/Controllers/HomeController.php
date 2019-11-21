<?php

namespace App\Http\Controllers;

use App\Rank;
use App\User;

use App\State;
use App\Category;
use App\Contingent;
use App\DamageReport;
use App\Seccontingent;
use Illuminate\Http\Request;
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

    // edit_profile users ba
    public function edit_profile(User $petugas)
    {
        $ranks= Rank::all();
        $categories= Category::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('petugas.edit',['petugas'=>$petugas,'ranks'=>$ranks,'categories'=>$categories]);
    }
    
    public function edit_profile_pemproses(User $petugas)
    {
        $ranks= Rank::all();
        $categories= Category::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('penyelia.edit',['petugas'=>$petugas,'ranks'=>$ranks,'categories'=>$categories]);
    }

    public function edit_profile_penyelia(User $petugas)
    {
        $ranks= Rank::all();
        $categories= Category::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('penyelia_2.edit',['petugas'=>$petugas,'ranks'=>$ranks,'categories'=>$categories]);
    }

    public function edit_profile_pegTinggi(User $pegawai)
    {
        $ranks= Rank::all();
        $categories= Category::all();
        if($pegawai->id == Auth::user()->id){
            $pegawai = Auth::user();
        }else{
            $pegawai = User::find($id);
        }
        return view('pegawai_tinggi.edit',['pegawai'=>$pegawai,'ranks'=>$ranks,'categories'=>$categories]);
    }

    // ********finish edit_profile ba********
    // edit_profile users kontinjen
    public function edit_profile_anggotaKnjen(User $petugas)
    {
        $states= State::all();
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('kontinjen.petugas.edit',['petugas'=>$petugas,'ranks'=>$ranks,'states'=>$states,'categories'=>$categories,'contingents'=>$contingents]);
    }

    public function edit_profile_pprosesKnjen(User $petugas)
    {
        $states= State::all();
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('kontinjen.penyelia.edit',['petugas'=>$petugas,'ranks'=>$ranks,'states'=>$states,'categories'=>$categories,'contingents'=>$contingents]);
    }

    public function edit_profile_pnyeliaKnjen(User $petugas)
    {
        $states= State::all();
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('kontinjen.penyelia_2.edit',['petugas'=>$petugas,'ranks'=>$ranks,'states'=>$states,'categories'=>$categories,'contingents'=>$contingents]);
    }

    public function edit_profile_pegTinggiKnjen(User $petugas)
    {
        $states= State::all();
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('kontinjen.pegawai_tinggi.edit',['petugas'=>$petugas,'ranks'=>$ranks,'states'=>$states,'categories'=>$categories,'contingents'=>$contingents]);
    }
    // *********finish edit profile***********
    // edit profile user daerah
    public function edit_profile_anggotaDaerah(User $petugas)
    {
        $states= State::all();
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('daerah.petugas.edit',['petugas'=>$petugas,'ranks'=>$ranks,'states'=>$states,'categories'=>$categories,'contingents'=>$contingents]);
    }

    public function edit_profile_pprosesDaerah(User $petugas)
    {
        $states= State::all();
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('daerah.penyelia.edit',['petugas'=>$petugas,'ranks'=>$ranks,'states'=>$states,'categories'=>$categories,'contingents'=>$contingents]);
    }

    public function edit_profile_pnyeliaDaerah(User $petugas)
    {
        $states= State::all();
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('daerah.penyelia_2.edit',['petugas'=>$petugas,'ranks'=>$ranks,'states'=>$states,'categories'=>$categories,'contingents'=>$contingents]);
    }

    public function edit_profile_pegTinggiDaerah(User $petugas)
    {
        $states= State::all();
        $ranks= Rank::all();
        $categories= Seccontingent::all();
        $contingents= Contingent::all();
        if($petugas->id == Auth::user()->id){
            $petugas = Auth::user();
        }else{
            $petugas = User::find($id);
        }
        return view('daerah.pegawai_tinggi.edit',['petugas'=>$petugas,'ranks'=>$ranks,'states'=>$states,'categories'=>$categories,'contingents'=>$contingents]);
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

@extends('layouts.app')
@section('content')
<style>
    .halaman{
        background: #536976;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to top, #292E49, #536976);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to top, #292E49, #536976); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        height: 59.5vh;
        -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    }
    h4{
        color:white;
    }

    b{
        color:white;
    }
    th{
        color:white;
    }
    td{
        color:white;
    }
    body {
                /* background-color: #fff; */
                /* background-image: linear-gradient(to bottom right, #ffffff,#ffffff, #3399ff); */
                /* background-image: url("images/bg.jpg"); */
                /* color: #636b6f; */
                /* color: #2196f3; */
                /* font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0; */
            }
            .collapse{
                background-color: #ffffff;
            }
            
    </style>
@if(Auth::guest() || Auth::user()->Roles->first()->name == 'petugas' && Auth::user()->cawangan == "Bukit Aman" || Auth::user()->Roles->first()->name == 'petugas' && Auth::user()->cawangan == "Daerah")
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body halaman">
                        <p class="text-right"><small class="pol_19"><b>(Polis 19 - Pin 5/89)</b></small><br>
                            @if(Auth::user()->Roles->first()->name == 'petugas' && Auth::user()->cawangan == "Bukit Aman") 
                            <small style="color:yellow;">{{ Auth::user()->cawangan }}</small>
                            @else
                            <small style="color:yellow;">{{ Auth::user()->cawangan }} {{Auth::user()->District->district_name  }}</small>
                            @endif
                        </p>
                        <center><h4><b>BUKU CATATAN KERJA DETEKTIF</b></h4></center>
                        <br/>
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama"><b>No Badan</b></label>
                                    <input type="text" readonly style="color:yellow;" class="form-control" value="{{ Auth::user()->no_badan }}">
                                </div>
                                @if(Auth::user()->cawangan == "Bukit Aman" || Auth::user()->cawangan == "Kontinjen")
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            @if(Auth::user()->cawangan == "Bukit Aman")
                                            <label for="nama"><b>Bahagian</b></label>
                                            @elseif(Auth::user()->cawangan == "Kontinjen")
                                            <label for="nama"><b>Seksyen</b></label>
                                            @endif
                                            <input type="text" readonly style="color:yellow;" class="form-control" value="{{ Auth::user()->Category->category_name }}">
                                        </div>
                                </div>
                                @else
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama"><b>Negeri</b></label>
                                            <input type="text" readonly style="color:yellow;" class="form-control" value="{{ Auth::user()->State->state_name }}">
                                        </div>
                                </div>
                                @endif
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama"><b>Nama</b></label>
                                    <input type="text" readonly style="color:yellow;" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                                @if(Auth::user()->cawangan == "Bukit Aman" || Auth::user()->cawangan == "Kontinjen")
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                            @if(Auth::user()->cawangan == "Bukit Aman")
                                        <label for="nama"><b>Seksyen</b></label>
                                        @elseif(Auth::user()->cawangan == "Kontinjen")
                                        <label for="nama"><b>Subseksyen</b></label>
                                        @endif
                                        <input type="text" readonly  style="color:yellow;" class="form-control" value="{{ Auth::user()->Subcategory->subcategory_name }}">
                                    </div>
                                </div>
                                @else
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama"><b>Daerah</b></label>
                                            <input type="text" readonly  style="color:yellow;" class="form-control" value="{{ Auth::user()->District->district_name }}">
                                        </div>
                                    </div>
                                @endif
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama"><b>Pangkat</b></label>
                                    <input type="text" style="color:yellow;" class="form-control" value="{{ Auth::user()->Pangkat->rank_name }}">
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama"><b>Jawatan</b></label>
                                            <input type="text"  style="color:yellow;" class="form-control" value="{{ Auth::user()->jawatan }}">
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@elseif(Auth::guest() || Auth::user()->Roles->first()->name == 'petugas' && Auth::user()->cawangan == "Kontinjen")
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body halaman">
                    <p class="text-right"><small class="pol_19"><b>(Polis 19 - Pin 5/89)</b></small><br><small style="color:yellow;">{{ Auth::user()->cawangan }} {{ Auth::user()->State->state_name }}</small></p>
                    
                    <center><h5><b>BUKU CATATAN KERJA DETEKTIF</b></h5></center>
                    <br/>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama"><b>No Badan</b></label>
                                <input type="text" style="color:yellow;" class="form-control" value="{{ Auth::user()->no_badan }}">
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama"><b>Seksyen</b></label>
                                        <input type="text" style="color:yellow;" class="form-control" value="{{ Auth::user()->Seksyen->section_name }}">
                                    </div>
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama"><b>Nama</b></label>
                                <input type="text" style="color:yellow;" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama"><b>Subseksyen</b></label>
                                        <input type="text"  style="color:yellow;" class="form-control" value="{{ Auth::user()->Subseksyen->subsection_name }}">
                                    </div>
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama"><b>Pangkat</b></label>
                                <input type="text" style="color:yellow;" class="form-control" value="{{ Auth::user()->Pangkat->rank_name }}">
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama"><b>Jawatan</b></label>
                                        <input type="text"  style="color:yellow;" class="form-control" value="{{ Auth::user()->jawatan }}">
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SB-Journal System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
               
                background: rgb(2,0,36);
                background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(64,64,185,1) 28%, rgba(0,212,255,1) 100%);
                /* background: #ADA996; 
                background: -webkit-linear-gradient(to top, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);
                background: linear-gradient(to top, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996); */

            }

            .collapse{
                background-color: black;
                color:white;
            }

            .dropdown-toggle{
                background-color: black;
                color:white;
            }

            .full-height {
                height: 63vh;
                /* height: 80vh; */
            }

            .flex-center {
                /* align-items: center; */
                /* color: #2196f3; */
                padding-top:50px;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 34px;
                color: white;
            }

            .links > a {
                /* color: #2196f3; */
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 20px;
                font-family: 'El Messiri', sans-serif;
                text-shadow: 1px 1px 3px black;
            }
            .dropdown-toggle{
                background-color: #ff9800;
            }
            .listjurnal{
                background-color: #4caf50;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
            <div class="login-logo animated fadeInDown" data-animation="fadeInDown">
                <div class="title m-b-md">
                    Selamat Datang ke Sistem Jurnal Cawangan Khas<br/>
                    {{-- @if()
                    @elseif(Auth::user()->cawangan == 'Bukit Aman')
                    <h5 style="color:white;">
                            {{ Auth::user()->Subseksyen->subsection_name }}
                            {{ Auth::user()->cawangan }} {{ Auth::user()->Kontinjen->kontinjen_name }}
                    </h5>
                    @elseif(Auth::user()->cawangan == 'Kontinjen')
                    <h5 style="color:white;">
                            {{ Auth::user()->Subseksyen->subsection_name }}
                            {{ Auth::user()->cawangan }} {{ Auth::user()->Kontinjen->kontinjen_name }}
                    </h5>
                    @else
                    <h5 style="color:white;">
                        {{ Auth::user()->Subseksyen->subsection_name }}
                        {{ Auth::user()->cawangan }} {{ Auth::user()->Kontinjen->kontinjen_name }}
                    </h5>
                    @endif --}}
                </div>
                @if(Auth::user()->Roles->first()->name != 'admin_kontinjen')
                @if(Auth::user()->name != 'admin')
                <div class="links">
                    @if(Auth::user()->cawangan == 'Kontinjen')
                    <div class="btn-group">
                            <a href="/" class="btn btn-success"><i class="fas fa-list-ul"></i>&nbsp; Jurnal anggota</a>
                            <a href="#" class="btn btn-success dropdown-toggle listjurnal" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
                            <ul class="dropdown-menu anggota">
                              <li><a href="/journal">Kontinjen</a></li>
                              <li><a href="journal/kck_daerah">Daerah</a></li>
                              {{-- <li class="divider"></li>
                              <li><a href="#">Separated link</a></li> --}}
                            </ul>
                          </div>
                    @else
                    <a href="/journal"><button type="button" data-toggle="tooltip" data-placement="left" title="Senarai jurnal anggota" data-original-title="" class="btn btn-success"><i class="fas fa-list-ul"></i>&nbsp; Senarai Jurnal</button></a>
                    @endif
                    <a href="#popup"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Info Sistem" data-original-title="" class="btn btn-primary"><i class="fas fa-info-circle"></i>&nbsp; Info Sistem</button></a>
                    @if(Auth::user()->cawangan == 'Bukit Aman')
                    <a href="jurnal_anggota_bahagian"><button type="button" data-toggle="tooltip" data-placement="right" title="Senarai Anggota" data-original-title="" class="btn btn-warning"><i class="fas fa-users"></i>&nbsp; Senarai Anggota</button></a>
                    @elseif(Auth::user()->cawangan == 'Kontinjen')
                    <div class="btn-group">
                        <a href="/" class="btn btn-warning"><i class="fas fa-users"></i>&nbsp; Senarai Anggota</a>
                        <a href="#" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
                        <ul class="dropdown-menu anggota">
                          <li><a href="jurnal_anggota_kontinjen">Kontinjen</a></li>
                          <li><a href="jurnal_anggota_daerah">Daerah</a></li>
                          {{-- <li class="divider"></li>
                          <li><a href="#">Separated link</a></li> --}}
                        </ul>
                      </div>
                    @else
                    <a href="jurnal_anggota_daerah"><button type="button" data-toggle="tooltip" data-placement="right" title="Senarai Anggota" data-original-title="" class="btn btn-warning"><i class="fas fa-users"></i>&nbsp; Senarai Anggota</button></a>
                    @endif
                </div>
                @else
                <div class="links">
                    <a href="/journal"><button type="button" data-toggle="tooltip" data-placement="left" title="Senarai jurnal anggota" data-original-title="" class="btn btn-success"><i class="fas fa-list-ul"></i>&nbsp; Senarai Jurnal</button></a>
                    {{-- <a href=""><button type="button" data-toggle="tooltip" data-placement="right" title="Manual sistem" data-original-title="" class="btn btn-primary"><i class="fas fa-info-circle"></i>&nbsp; Manual Pengguna</button></a> --}}
                    <a href="#popup"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Info Sistem" data-original-title="" class="btn btn-primary"><i class="fas fa-info-circle"></i>&nbsp; Info Sistem</button></a>
                    <div class="btn-group">
                        <a href="/" class="btn btn-warning"><i class="fas fa-users"></i>&nbsp; Senarai Anggota</a>
                        <a href="#" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
                        <ul class="dropdown-menu anggota">
                          <li><a href="senarai_anggota">Bukit Aman</a></li>
                          <li><a href="senarai_anggota_kontinjen">Kontinjen</a></li>
                          <li><a href="senarai_anggota_daerah">Daerah</a></li>
                          {{-- <li class="divider"></li>
                          <li><a href="#">Separated link</a></li> --}}
                        </ul>
                      </div>
                </div>
                @endif
                @else
                <div class="title m-b-md">Admin Kontinjen</div>
                @endif
                {{-- <div class="alert alert-dismissible alert-info">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Perhatian! </strong><a href="/laporan_kerosakan" class="alert-link">{{ $notComplete->count() }}</a>
                        tugasan
                        belum selesai.
                    </div> --}}
            </div>
            </div>
        </div>
    </body>
</html>
@endif
@endsection
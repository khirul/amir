@extends('layouts.app')
@section('content')
<style>
    .halaman{
        background: #536976;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to top, #292E49, #536976);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to top, #292E49, #536976); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        height: 59.5vh;
        box-shadow: 5px 5px;
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

            .dropdown-toggle{
                background-color: #ffffff;
            }
            
    </style>
@if(Auth::guest() || Auth::user()->Roles->first()->name == 'petugas' && Auth::user()->cawangan == "Bukit Aman")
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body halaman">
                        <p class="text-right"><small class="pol_19"><b>(Polis 19 - Pin 5/89)</b></small><br><small style="color:yellow;">{{ Auth::user()->cawangan }}</small></p>
                        <br>
                        <center><h4><b>BUKU CATATAN KERJA DETEKTIF</b></h4></center>
                        <br><br>
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama"><b>No Badan</b></label>
                                    <input type="text" style="color:yellow;" class="form-control" value="{{ Auth::user()->no_badan }}">
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama"><b>Seksyen</b></label>
                                            <input type="text" style="color:yellow;" class="form-control" value="{{ Auth::user()->Category->category_name }}">
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
                                            <input type="text"  style="color:yellow;" class="form-control" value="{{ Auth::user()->Subcategory->subcategory_name }}">
                                        </div>
                                </div>
                        </div>
                        {{-- <table class="table table-borderless">
                            <tr>
                            <th width="9%">No Badan</th>
                            <td>{{ Auth::user()->no_badan }}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <th  width="9%">Seksyen</th>
                            <td  width="11%">{{ Auth::user()->Category->category_name }}</td>
                            </tr>
                            <tr>
                            <th>Nama</th>
                            <td>{{ Auth::user()->name }}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <th>Subseksyen</th>
                            <td>{{ Auth::user()->Subcategory->subcategory_name }}</td>
                            </tr>
                        </table> --}}
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
                    <p class="text-right"><small class="pol_19"><b>(Polis 19 - Pin 5/89)</b></small><br><small style="color:yellow;">{{ Auth::user()->cawangan }}</small></p>
                    <br>
                    <center><h4><b>BUKU CATATAN KERJA DETEKTIF</b></h4></center>
                    <br><br>
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
                background-image: linear-gradient(to bottom right, #ffffff,#ffffff, #3399ff);
                /* background: #ADA996; 
                background: -webkit-linear-gradient(to top, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);
                background: linear-gradient(to top, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996); */

            }

            .collapse{
                background-color: #ffffff;
            }

            .dropdown-toggle{
                background-color: #ffffff;
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
                color: #000000;
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
                text-shadow: 1px 1px 3px #000000;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
            <div class="login-logo animated fadeInDown" data-animation="fadeInDown">
                <div class="title m-b-md">
                    Selamat Datang ke Sistem Journal Cawangan Khas
                    {{-- <b>S</b>pecial <b>B</b>ranch <b>J</b>ournal <b>S</b>ystem --}}
                </div>
                <div class="links">
                <a href="/journal"><button type="button" data-toggle="tooltip" data-placement="left" title="Senarai journal anggota" data-original-title="" class="btn btn-success"><i class="fas fa-list-ul"></i>&nbsp; Senarai Journal</button></a>
                <a href=""><button type="button" data-toggle="tooltip" data-placement="right" title="Manual sistem" data-original-title="" class="btn btn-primary"><i class="fas fa-info-circle"></i>&nbsp; Manual Pengguna</button></a>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
@endif
@endsection
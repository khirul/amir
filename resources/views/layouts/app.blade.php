<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SB-Journal System</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
        integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-paper.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('DataTables/datatables.min.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
            overflow-x: hidden;
        }

        .fa-btn {
            margin-right: 6px;
        }

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
li:hover > ul {
    display: block;
}
.sbjs{
    background-color: black;
    color:white;
}
.navbar-jurnal{
    background-color: black;
    color:white;
}
.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
</style>
    <link rel="stylesheet" href="{{ URL::asset('css/animation.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
</head>

<body id="app-layout">
    <div class=" logo  d-flex justify-content-center">
        <img src="{{ asset('images/journal_v5.jpg') }}" height="120px" width="100%">
    </div>
    <nav class="navbar navbar-reversed navbar-static-top">
        <div class="container-fluid" style="background-color:black">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand sbjs" style=" font-family: 'Rouge Script'" href="{{ url('/') }}">
                    SBJS
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse" style=" background-color: black;">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                        <li><a class="navbar-jurnal"  href="#popup">Info Sistem</a></li>
                        {{-- <li><a class="navbar-jurnal"  href="#" data-toggle="modal" data-target="#myModal_info">Manual Pengguna</a></li> --}}
                    @if(Auth::user() && Auth::user()->Roles->first()->name == 'admin')
                    <li><a class="navbar-jurnal" href="{{ url('/journal') }}">Senarai Jurnal</a></li>
                    <li class="dropdown">
                        <a href="#" class="navbar-jurnal" data-toggle="dropdown" role="button" aria-expanded="false">
                        Senarai Pengguna<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-submenu">
                                <a class="test" tabindex="-1" href="#">Bukit Aman <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/senarai_pegawai_tinggi') }}">Senarai Pegawai Tinggi</a></li>
                                    <li><a href="{{ url('/senarai_penyelia_2') }}">Senarai Penyelia 2</a></li>
                                    <li><a href="{{ url('/senarai_penyelia') }}">Senarai Penyelia 1</a></li>
                                    <li><a href="{{ url('/senarai_anggota') }}">Senarai Anggota</a></li>
                                    {{-- <li class="dropdown-submenu">
                                        <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="#">3rd level dropdown</a></li>
                                        <li><a href="#">3rd level dropdown</a></li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="test" tabindex="-1" href="#">Ibu Pejabat Polis Kontinjen <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/senarai_pegawai_tinggi_kontinjen') }}">Senarai Pegawai Tinggi</a></li>
                                    <li><a href="{{ url('/senarai_penyelia_2_kontinjen') }}">Senarai Penyelia 2</a></li>
                                    <li><a href="{{ url('/senarai_penyelia_kontinjen') }}">Senarai Penyelia 1</a></li>
                                    <li><a href="{{ url('/senarai_anggota_kontinjen') }}">Senarai Anggota</a></li>
                                    <li><a href="{{ url('/senarai_admin_kontinjen') }}">Senarai Admin Kontinjen</a></li>
                                    {{-- <li class="dropdown-submenu">
                                        <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="#">3rd level dropdown</a></li>
                                        <li><a href="#">3rd level dropdown</a></li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="test" tabindex="-1" href="#">Ibu Pejabat Polis Daerah <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/senarai_pegawai_tinggi_daerah') }}">Senarai Pegawai Tinggi</a></li>
                                    <li><a href="{{ url('/senarai_penyelia_2_daerah') }}">Senarai Penyelia 2</a></li>
                                    <li><a href="{{ url('/senarai_penyelia_daerah') }}">Senarai Penyelia 1</a></li>
                                    <li><a href="{{ url('/senarai_anggota_daerah') }}">Senarai Anggota</a></li>
                                    {{-- <li class="dropdown-submenu">
                                        <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="#">3rd level dropdown</a></li>
                                        <li><a href="#">3rd level dropdown</a></li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                            <a href="#" class="navbar-jurnal" data-toggle="dropdown" role="button" aria-expanded="false">
                            Kategori<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">Bukit Aman <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                            <li><a href="{{ url('/category') }}">Bahagian</a></li>
                                            <li><a href="{{ url('/subcategory') }}">Seksyen</a></li>
                                        {{-- <li class="dropdown-submenu">
                                            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                            <li><a href="#">3rd level dropdown</a></li>
                                            <li><a href="#">3rd level dropdown</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">Ibu Pejabat Polis Kontinjen <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        {{-- <li><a href="{{ url('/senarai_kontinjen') }}">Senarai Kontinjen</a></li> --}}
                                        <li><a href="{{ url('/category_kontinjen') }}">Senarai Seksyen</a></li>
                                        <li><a href="{{ url('/subcategory_kontinjen') }}">Senarai Subseksyen</a></li>
                                        {{-- <li><a href="{{ url('/senarai_anggota') }}">Senarai Anggota</a></li> --}}
                                        {{-- <li class="dropdown-submenu">
                                            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                            <li><a href="#">3rd level dropdown</a></li>
                                            <li><a href="#">3rd level dropdown</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">Ibu Pejabat Polis Daerah <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/state') }}">Senarai Negeri</a></li>
                                        <li><a href="{{ url('/district') }}">Senarai Daerah</a></li>
                                        {{-- <li><a href="{{ url('/senarai_penyelia') }}">Senarai Penyelia 1</a></li>
                                        <li><a href="{{ url('/senarai_anggota') }}">Senarai Anggota</a></li> --}}
                                        {{-- <li class="dropdown-submenu">
                                            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                            <li><a href="#">3rd level dropdown</a></li>
                                            <li><a href="#">3rd level dropdown</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </li>
                                <li class="dropdown">
                                <a class="test" tabindex="-1" href="/rank">Pangkat</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                                <a href="#" class="navbar-jurnal" data-toggle="dropdown" role="button" aria-expanded="false">
                                Statistik<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                        <li><a href="{{ url('/bar-chart') }}">Keseluruhan Jurnal</a></li>
                                        {{-- <li><a href="{{ url('/bar-chart/tajuk') }}">Keseluruhan Mengikut Tajuk</a></li> --}}
                                        <li><a href="{{ url('/pie-bahagian') }}">Peratus Tajuk Jurnal</a></li>
                                        {{-- <li><a href="{{ url('/senarai_anggota') }}">Senarai Anggota</a></li> --}}
                                        {{-- <li class="dropdown-submenu">
                                            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                            <li><a href="#">3rd level dropdown</a></li>
                                            <li><a href="#">3rd level dropdown</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                        </li>
                    @elseif(Auth::user() && Auth::user()->Roles->all() && Auth::user()->Roles->first()->name != 'admin_kontinjen' )
                        <li><a class="navbar-jurnal" href="{{ url('/journal') }}">Senarai Jurnal</a></li>
                        @if(Auth::user() && Auth::user()->Roles->first()->name == 'petugas')
                        @if(Auth::user()->cawangan == 'Bukit Aman')
                        <li><a class="navbar-jurnal" href="{{ url('/jurnal_anggota_bahagian') }}">Jumlah artikel</a></li>
                        @elseif(Auth::user()->cawangan == 'Kontinjen')
                        <li><a class="navbar-jurnal" href="{{ url('/jurnal_anggota_kontinjen') }}">Jumlah artikel</a></li>
                        @else
                        <li><a class="navbar-jurnal" href="{{ url('/jurnal_anggota_daerah') }}">Jumlah artikel</a></li>
                        @endif
                        <li><a class="navbar-jurnal" href="{{ url('/documents/manual.pdf') }}">Manual SB-Journal System</a></li>
                    @endif
                    {{-- <li><a href="{{ url('anggota/tugasan/'.Auth::user()->id) }}">Penugasan</a></li> --}}
                    @endif
                    @if(Auth::user() && Auth::user()->Roles->first()->name == 'kck')
                    <li><a class="navbar-jurnal" href="{{ url('/journal/kck_daerah') }}">Senarai Jurnal Daerah</a></li>
                    @endif
                    @if(Auth::user() && Auth::user()->Roles->first()->name == 'admin_kontinjen')
                    <li class="dropdown">
                            <a href="#" class="navbar-jurnal" data-toggle="dropdown" role="button" aria-expanded="false">
                            Senarai Pengguna<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">Ibu Pejabat Polis Kontinjen <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/senarai_pegawai_tinggi_kontinjen') }}">Senarai Pegawai Tinggi</a></li>
                                        <li><a href="{{ url('/senarai_penyelia_2_kontinjen') }}">Senarai Penyelia 2</a></li>
                                        <li><a href="{{ url('/senarai_penyelia_kontinjen') }}">Senarai Penyelia 1</a></li>
                                        <li><a href="{{ url('/senarai_anggota_kontinjen') }}">Senarai Anggota</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">Ibu Pejabat Polis Daerah <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/senarai_pegawai_tinggi_daerah') }}">Senarai Pegawai Tinggi</a></li>
                                        <li><a href="{{ url('/senarai_penyelia_2_daerah') }}">Senarai Penyelia 2</a></li>
                                        <li><a href="{{ url('/senarai_penyelia_daerah') }}">Senarai Penyelia 1</a></li>
                                        <li><a href="{{ url('/senarai_anggota_daerah') }}">Senarai Anggota</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        {{-- statistik kontinjen --}}
                        {{-- <li><a href="{{ url('/bar-chart') }}">Keseluruhan Jurnal</a></li> --}}
                    @endif
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right" style=" background-color: black;">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    {{-- <li><a class="navbar-jurnal" href="{{ url('/login') }}">Log Masuk</a></li> --}}
                    {{-- <li><a class="navbar-jurnal"  href="#" data-toggle="modal" data-target="#myModal_login">Log Masuk</a></li> --}}
                    <!-- <li><a href="{{ url('/register') }}">Daftar Pengguna</a></li> -->
                    @else
                    <li class="dropdown">
                        <a href="#" class="navbar-jurnal" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->cawangan == 'Bukit Aman')
                                @if(Auth::user() && Auth::user()->Roles->first()->name == 'petugas')
                                    <li><a href="{{ route('edit.profile', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @elseif(Auth::user() && Auth::user()->Roles->first()->name == 'pemproses')
                                    <li><a href="{{ route('edit.pemproses', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @elseif(Auth::user() && Auth::user()->Roles->first()->name == 'penyelia')
                                    <li><a href="{{ route('edit.penyelia', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @elseif(Auth::user() && Auth::user()->Roles->first()->name == 'kpp')
                                    <li><a href="{{ route('edit.pegawai_tinggi', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @elseif(Auth::user() && Auth::user()->Roles->first()->name == 'pp')
                                    <li><a href="{{ route('edit.pegawai_tinggi', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @endif
                            @elseif(Auth::user()->cawangan == 'Kontinjen')
                                @if(Auth::user() && Auth::user()->Roles->first()->name == 'petugas')
                                    <li><a href="{{ route('edit.anggotaKnjen', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @elseif(Auth::user() && Auth::user()->Roles->first()->name == 'pemproses')
                                    <li><a href="{{ route('edit.pprosesKnjen', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @elseif(Auth::user() && Auth::user()->Roles->first()->name == 'penyelia')
                                    <li><a href="{{ route('edit.pnyeliaKnjen', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @elseif(Auth::user() && Auth::user()->Roles->first()->name == 'kck')
                                    <li><a href="{{ route('edit.pegTinggiKnjen', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @endif
                            @elseif(Auth::user()->cawangan == 'Daerah')
                                @if(Auth::user() && Auth::user()->Roles->first()->name == 'petugas')
                                    <li><a href="{{ route('edit.anggotaDaerah', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @elseif(Auth::user() && Auth::user()->Roles->first()->name == 'pemproses')
                                    <li><a href="{{ route('edit.pprosesDaerah', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @elseif(Auth::user() && Auth::user()->Roles->first()->name == 'penyelia')
                                    <li><a href="{{ route('edit.pnyeliaDaerah', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @elseif(Auth::user() && Auth::user()->Roles->first()->name == 'kckd')
                                    <li><a href="{{ route('edit.pegTinggiDaerah', Auth::user()->id) }}"><i class="glyphicon glyphicon-wrench"></i> Kemaskini Profil</a></li>
                                @endif
                            @endif
                            <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Log Keluar</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @include('layouts.modal_info')
    </main>
    <main class="py-4">
            @include('layouts.modal_login')
        </main>
    @if(Session::has('flash_message'))
    <div class="alert alert-info">
        {{ Session::get('flash_message') }}
    </div>
    @endif
    @include('layouts.noti')
    @yield('content')
    <div class="footer container">
        <div class="row">
            <div class="col-md-6 col-md-offset-5">
                <div class="centre-block">&copy; Unit Teknologi Maklumat E7D 2019</div>
            </div>
        </div>
    </div>
    <!-- JavaScripts -->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    
    <!-- dependent dropdown must put after above script-->
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.gooleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    <script src="{{asset('js/custom.js')}}" type="text/javascript"></script>
    <!-- **************** -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('DataTables/datatables.min.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
        $('.dt').DataTable();

        // dropdown menu
        $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
            });
        });
// ************

// tooltips
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
// ***********

</script>
</body>
</html>

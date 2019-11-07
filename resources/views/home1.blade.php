@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Halaman Utama</div> -->
                <div class="panel-body halaman">
                    @if(Auth::guest() || Auth::user()->Roles->first()->name == 'petugas')
                    <p class="text-right"><small class="pol_19"><b>(Polis 19 - Pin 5/89)</b></small></p>
                    <br><br>
                    <center><h4><b>BUKU CATATAN KERJA DETEKTIF</b></h4></center>
                    <br>
                    <table class="table table-borderless">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">No Badan</th>
                        <td>{{ Auth::user()->no_badan }}</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th scope="row">Seksyen</th>
                        <td>{{ Auth::user()->Category->category_name }}</td>
                        </tr>
                        <tr>
                        <th scope="row">Nama</th>
                        <td>{{ Auth::user()->name }}</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th scope="row">Subseksyen</th>
                        <td>{{ Auth::user()->Subcategory->subcategory_name }}</td>
                        </tr>
                    </tbody>
                    </table>
                    @else
                    <h4>Selamat Datang ke SB-Journal System</h4>
                    @endif
                    </div>
                    </div>
                </div>
        <!-- <div class="alert alert-dismissible alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Makluman! </strong><a href="/laporan_kerosakan" class="alert-link">{{ $notComplete->count() }}</a>
            tugasan
            belum selesai.
        </div> -->
    </div>
</div>
<style>
    .halaman{
        height: 55vh;
    }
</style>
@endsection

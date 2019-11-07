@extends('layouts.app')
@section('content')
<style>
    .isi{
        padding-left: 15px;
    }
</style>
<div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="jumbotron">
                    <fieldset>
                        <legend>Papar Jurnal</legend>
                        <table class="table table-bordered table-striped" style="width: 100%">
                        <tr>
                            <th>Tajuk</th>
                            <td>{{$journal->tajuk_journal}}</td>
                        </tr>
                        <tr>
                            <th>Tarikh</th>
                            <td>{{ \Carbon\Carbon::parse($journal->tarikh_journal)->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <th>Arahan</th>
                            <td>{{$journal->arahan}}</td>
                        </tr>
                        <tr>
                            <th>Tindakan</th>
                            <td>{{$journal->artikel}}</td>
                        </tr>
                        <tr>
                            <th>Rujukan Fail</th>
                            <td>{{$journal->rujukan_fail}}</td>
                        </tr>
                        <tr>
                            <th>Ulasan Pegawai Penyelia</th>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>{{ $journal->User->name}}</td>
                            <td>{{ $journal->nama_penyelia()}}</td>
                        </tr>
                        <tr>
                            <td>{{ $journal->jawatan}}</td>
                            <td>{{ Auth::user()->cawangan }}</td>
                            <td>{{ $journal->nama_penyelia()}}</td>
                        </tr>
                        </table>
                    </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection
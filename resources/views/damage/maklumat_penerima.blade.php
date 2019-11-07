@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Maklumat Penerima</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/laporan/maklumat_penerima'.$laporan->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nama_penerima" class="col-md-4 control-label">Nama Penerima</label>
                            <div class="col-md-6">
                                <input id="nama_penerima" type="text" readonly="readonly" class="form-control" name="nama_penerima" value="{{ old('nama_penerima',$laporan->nama_penerima) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_bdn_penerima" class="col-md-4 control-label">No Badan Penerima</label>
                            <div class="col-md-6">
                                <input id="no_bdn_penerima" type="text" readonly="readonly" class="form-control" name="no_bdn_penerima" value="{{ old('no_bdn_penerima',$laporan->no_bdn_penerima) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bahagian_penerima" class="col-md-4 control-label">Bahagian / Seksyen</label>
                            <div class="col-md-6">
                                <input id="bahagian_penerima" type="text" readonly="readonly" class="form-control" name="bahagian_penerima" value="{{ old('bahagian_penerima',$laporan->bahagian_penerima) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <!-- <button type="button" class="btn btn-success">
                                   <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                   Kembali
                                </button> -->
                                <a href="/laporan_kerosakan"><button type="button"  class="btn btn-success">Kembali</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>
<style>
a:link
{
    color:white;
    text-align:center;
}
</style>    

@endsection
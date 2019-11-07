@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tindakan Laporan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('laporan/tindakan/'.$laporan->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama Pengguna</label>
                            <div class="col-md-6">
                                <input id="name" type="text" readonly="readonly" class="form-control" name="name" value="{{ old('name',$laporan->name) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bahagian" class="col-md-4 control-label">Bahagian / Seksyen</label>
                            <div class="col-md-6">
                                <input id="bahagian" readonly="readonly" type="text" class="form-control" name="bahagian" value="{{ old('bahagian',$laporan->bahagian) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">No Siri</label>
                            <div class="col-md-6">
                                <input id="code" type="text" readonly="readonly" class="form-control" name="code" value="{{ old('code',$laporan->code) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-md-4 control-label">Model</label>
                            <div class="col-md-6">
                                <input id="category" type="text" readonly="readonly" class="form-control" name="category" value="{{ old('category_name',$laporan->category->category_name) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subcategory" class="col-md-4 control-label">Sub Model</label>
                            <div class="col-md-6">
                                <input id="subcategory" type="text" readonly="readonly" class="form-control" name="subcategory" value="{{ old('subcategory_name',$laporan->subcategory->subcategory_name) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kerosakan" class="col-md-4 control-label">Jenis Kerosakan</label>

                            <div class="col-md-6">
                                <input id="jenis_kerosakan" type="text" readonly="readonly" class="form-control" name="jenis_kerosakan" value="{{ old('jenis_kerosakan',$laporan->jenis_kerosakan) }}">
                            </div>
                        </div>
                        <br>
                        <hr>
                        
                        <div class="form-group{{ $errors->has('tarikh_keluar') ? ' has-error' : '' }}">
                            <label for="tarikh_keluar" class="col-md-4 control-label"><span class="badge badge-warning">Tarikh Keluar</span></label>

                            <div class="col-md-6">
                                <input id="tarikh_keluar" type="date" class="form-control" name="tarikh_keluar" value="{{($laporan->tarikh_keluar) }}">

                                @if ($errors->has('tarikh_keluar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tarikh_keluar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('nama_penerima') ? ' has-error' : '' }}">
                            <label for="nama_penerima" class="col-md-4 control-label"><span class="badge badge-warning">Nama Penerima</label>

                            <div class="col-md-6">
                                <input id="nama_penerima" type="text" class="form-control" name="nama_penerima" value="{{($laporan->nama_penerima) }}">

                                @if ($errors->has('nama_penerima'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_penerima') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_bdn_penerima') ? ' has-error' : '' }}">
                            <label for="no_bdn_penerima" class="col-md-4 control-label"><span class="badge badge-warning">No Badan Penerima</label>

                            <div class="col-md-6">
                                <input id="no_bdn_penerima" type="text" class="form-control" name="no_bdn_penerima" value="{{($laporan->no_bdn_penerima) }}">

                                @if ($errors->has('no_bdn_penerima'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_bdn_penerima') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('bahagian_penerima') ? ' has-error' : '' }}">
                            <label for="bahagian_penerima" class="col-md-4 control-label"><span class="badge badge-warning">Bahagian</label>

                            <div class="col-md-6">
                                <input id="bahagian_penerima" type="text" class="form-control" name="bahagian_penerima" value="{{($laporan->bahagian_penerima) }}">

                                @if ($errors->has('bahagian_penerima'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bahagian_penerima') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status_laporan') ? ' has-error' : '' }}">
                            <label for="status_laporan" class="col-md-4 control-label "><span class="badge badge-secondary">Status Laporan</span></label>
                            <div class="col-md-6">
                            <select name="status_laporan" id="" class="form-control selectpicker">
                                <option value="">Sila Pilih</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Hapus">Hapus</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                                @if ($errors->has('status_laporan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status_laporan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tindakan') ? ' has-error' : '' }}">
                            <label for="tindakan" class="col-md-4 control-label"><span class="badge badge-warning">Tindakan</label>

                            <div class="col-md-6">
                            <textarea id="tindakan" cols="41" row="20" class="tindakan" name="tindakan" value="{{($laporan->tindakan) }}"></textarea>

                                @if ($errors->has('tindakan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tindakan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('petugas') ? ' has-error' : '' }}">
                            <label for="petugas" class="col-md-4 control-label"><span class="badge badge-warning">Anggota Bertugas</label>

                            <div class="col-md-6">
                                <select name="petugas" id="petugas" class="form-control selectpicker" data-live-search="true">
										@foreach($staff as $petugas)
												<option value="{{ $petugas->id }}" @if (old('petugas',$laporan->petugas) == $petugas->id ) selected="selected" @endif >{{ $petugas->name }}</option>
										@endforeach
                                </select>

                                @if ($errors->has('petugas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('petugas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                   <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                   Tindakan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>


@endsection

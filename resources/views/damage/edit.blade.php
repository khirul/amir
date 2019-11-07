@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kemaskini Laporan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('laporan_kerosakan/edit/'.$laporan->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama Pengguna</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$laporan->name) }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">No Telefon Pengguna</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel',$laporan->tel) }}">

                                @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <div class="form-group{{ $errors->has('bahagian') ? ' has-error' : '' }}">
                            <label for="bahagian" class="col-md-4 control-label">Bahagian / Seksyen</label>

                            <div class="col-md-6">
                                <input id="bahagian" type="text" class="form-control" name="bahagian" value="{{ old('bahagian',$laporan->bahagian) }}">

                                @if ($errors->has('bahagian'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bahagian') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">No Siri</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code',$laporan->code) }}">

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Model</label>
                            <div class="col-md-6">
                                <select name="category" id="category" class="form-control selectpicker" data-live-search="true">
										@foreach($categories as $category)
												<option value="{{ $category->id }}" 
                                                @if (old('category',$laporan->category_id) == $category->id ) 
                                                selected="selected" @endif >{{ old('category_name',$category->category_name) }}
                                                </option>
										@endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('subcategory_id') ? ' has-error' : '' }}">
                            <label for="subcategory_id" class="col-md-4 control-label">Sub Model</label>
                            <div class="col-md-6" >
                                <select name="subcategory_id" id="SUB" class="form-control">
                                @foreach($subcategories as $subcategory)
                                <!-- <option>--Sub Model--</option> -->
                                <option value="{{ $subcategory->id }}" 
                                                @if (old('subcategory',$laporan->subcategory_id) == $subcategory->id ) 
                                                selected="selected" @endif >{{ old('subcategory_name',$subcategory->subcategory_name) }}
                                                </option>
                                @endforeach
								</select>
                                @if ($errors->has('subcategory_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subcategory_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jenis_kerosakan') ? ' has-error' : '' }}">
                            <label for="jenis_kerosakan" class="col-md-4 control-label">Jenis Kerosakan</label>

                            <div class="col-md-6">
                                <input id="jenis_kerosakan" type="text" class="form-control" name="jenis_kerosakan" value="{{ old('jenis_kerosakan',$laporan->jenis_kerosakan) }}">

                                @if ($errors->has('jenis_kerosakan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_kerosakan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tarikh_masuk') ? ' has-error' : '' }}">
                            <label for="tarikh_masuk" class="col-md-4 control-label">Tarikh Masuk</label>

                            <div class="col-md-6">
                                <input id="tarikh_masuk" type="date" class="form-control" name="tarikh_masuk" value="{{ old('tarikh_masuk',$laporan->tarikh_masuk) }}">

                                @if ($errors->has('tarikh_masuk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tarikh_masuk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('petugas') ? ' has-error' : '' }}">
                            <label for="petugas" class="col-md-4 control-label">Anggota Bertugas</label>

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
                                   Kemaskini
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
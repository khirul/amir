@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                {{-- <div class="panel-heading">Kemaskini Profil Anggota</div> --}}
                <div class="panel-body">
                        <p class="text-right"><span class="label label-info">Kontinjen</span></p>
                        <h3>Kemaskini Profil Anggota</h3>
                        <hr/>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('anggota_kontinjen/edit/'.$petugas->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$petugas->name) }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_badan') ? ' has-error' : '' }}">
                                <label for="no_badan" class="col-md-4 control-label">No. Badan</label>
    
                                <div class="col-md-6">
                                    <input readonly id="no_badan" type="text" class="form-control" name="no_badan" value="{{ old('no_badan',$petugas->no_badan) }}">
                                    <small class="text-muted">No. Badan tidak boleh diubah.</small>
                                    @if ($errors->has('no_badan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_badan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('jawatan') ? ' has-error' : '' }}">
                                    <label for="jawatan" class="col-md-4 control-label">Jawatan</label>
        
                                    <div class="col-md-6">
                                        <input id="jawatan" type="text" class="form-control" name="jawatan" value="{{ old('jawatan',$petugas->jawatan) }}">
                                        @if ($errors->has('jawatan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('jawatan') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('rank') ? ' has-error' : '' }}">
                                        <label for="rank" class="col-md-4 control-label">Pangkat</label>
                                        <div class="col-md-6">
                                            <select name="rank" id="rank" class="form-control selectpicker" data-live-search="true">
                                                <option value="">Sila Pilih</option>
                                                @foreach($ranks as $pangkat)
                                                            <option value="{{ $pangkat->id }}" 
                                                            @if (old('rank',$petugas->rank_id) == $pangkat->id ) selected="selected" 
                                                            @endif >{{ $pangkat->rank_name }}
                                                            </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('rank'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('rank') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email',$petugas->email) }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div hidden class="form-group">
                                <label for="cawangan" class="col-md-4 control-label">Formasi</label>
                                <div class="col-md-6">
                                    <input id="cawangan" type="text" class="form-control" name="cawangan" value="Kontinjen">
                                </div>
                            </div>
                            {{-- <div class="form-group{{ $errors->has('kontinjen') ? ' has-error' : '' }}">
                                    <label for="kontinjen" class="col-md-4 control-label">Kontinjen</label>
                                    <div class="col-md-6">
                                        <select name="kontinjen" id="kontinjen" class="form-control selectpicker"
                                            data-live-search="true">
                                            <option value="">--Sila Pilih--</option>
                                            @foreach($contingents as $contingent)
                                            <option value="{{ $contingent->id }}"
                                                @if (old('kontinjen',$petugas->kontinjen) == $contingent->id ) selected="selected" 
                                                        @endif >{{ $contingent->kontinjen_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="form-group{{ $errors->has('negeri') ? ' has-error' : '' }}">
                                    <label for="negeri" class="col-md-4 control-label">Kontinjen</label>
                                    <div class="col-md-6">
                                        <select name="negeri" id="negeri" class="form-control selectpicker"
                                            data-live-search="true">
                                            <option value="">--Sila Pilih--</option>
                                            @foreach($states as $negeri)
                                            <option value="{{ $negeri->id }}"
                                                @if (old('kontinjen',$petugas->state_id) == $negeri->id ) selected="selected" 
                                                        @endif >{{ $negeri->state_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('negeri'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('negeri') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('seksyen') ? ' has-error' : '' }}">
                                        <label for="seksyen" class="col-md-4 control-label">Seksyen</label>
                                        <div class="col-md-6">
                                            <select name="seksyen" id="sksyn" class="form-control selectpicker"
                                                data-live-search="true">
                                                <option value="">--Sila Pilih--</option>
                                                @foreach($categories as $seksyen)
                                                <option value="{{ $seksyen->id }}"
                                                    @if (old('seksyen',$petugas->seccontingent_id) == $seksyen->id ) selected="selected" 
                                                            @endif >{{ $seksyen->section_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('seksyen'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('seksyen') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="subcategory" class="col-md-4 control-label">Subseksyen</label>
                
                                            <div class="col-md-6">
                                                <select name="subcategorycontingent_id" id="SUB4" class="form-control">
                                                    <option>--Subseksyen--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div hidden class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                                <label for="role" class="col-md-4 control-label">Tugas</label>
                    
                                                <div class="col-md-6">
                                                    <input id="role" type="text" class="form-control" name="role" value="petugas">
                    
                                                    @if ($errors->has('role'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('role') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div hidden class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                                <label for="status" class="col-md-4 control-label">Status</label>
                    
                                                <div class="col-md-6">
                                                    <input id="status" type="text" class="form-control" name="status" value="1">
                    
                                                    @if ($errors->has('status'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Katalaluan</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                   <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                   Simpan
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
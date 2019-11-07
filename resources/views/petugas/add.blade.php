@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Tambah Anggota</div> -->
                <div class="panel-body">
                <p class="text-right"><span class="label label-info">Bukit Aman</span></p>
                <h3>Tambah Anggota</h3>
                <hr/>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('anggota/add') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

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
                                <input id="no_badan" type="text" class="form-control" name="no_badan" value="{{ old('no_badan') }}">

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
                                    <input id="jawatan" type="text" class="form-control" name="jawatan" value="{{ old('jawatan') }}">
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
                                        <select name="rank" id="rank" class="form-control selectpicker"
                                            data-live-search="true">
                                            <option value="">--Sila Pilih--</option>
                                            @foreach($ranks as $rank)
                                            <option value="{{ $rank->id }}">{{ $rank->rank_name }}</option>
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
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">

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
                                <input id="cawangan" type="text" class="form-control" name="cawangan" value="Bukit Aman">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Bahagian</label>

                            <div class="col-md-6">
                                <select name="category" id="category" class="form-control selectpicker"
                                    data-live-search="true">
                                    <option value="">--Sila Pilih--</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subcategory" class="col-md-4 control-label">Seksyen</label>

                            <div class="col-md-6">
                                <select name="subcategory_id" id="SUB1" class="form-control">
                                    <option>--Seksyen--</option>
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
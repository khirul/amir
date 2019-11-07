@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Pangkat</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/rank/add') }}">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('rank_name') ? ' has-error' : '' }}">
                            <label for="rank_name" class="col-md-4 control-label">Seksyen</label>

                            <div class="col-md-6">
                                <input id="rank_name" type="text" class="form-control" name="rank_name" value="{{ old('rank_name') }}">

                                @if ($errors->has('rank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rank_name') }}</strong>
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
@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Negeri</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/state/add') }}">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('state_name') ? ' has-error' : '' }}">
                            <label for="state_name" class="col-md-4 control-label">Negeri</label>

                            <div class="col-md-6">
                                <input id="state_name" type="text" class="form-control" name="state_name" value="{{ old('state_name') }}">

                                @if ($errors->has('state_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state_name') }}</strong>
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
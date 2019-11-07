@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kemaskini Daerah</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('district/edit/'.$district->id) }}">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('district_name') ? ' has-error' : '' }}">
                            <label for="district_name" class="col-md-4 control-label">Jenis Daerah</label>

                            <div class="col-md-6">
                            <input id="district_name" type="text" class="form-control" name="district_name" value="{{ old('district_name',$district->district_name) }}">

                                @if ($errors->has('district_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('district_name') }}</strong>
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
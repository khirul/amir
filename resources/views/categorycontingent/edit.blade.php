@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kemaskini Seksyen Kontinjen</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('category_kontinjen/edit/'.$category->id) }}">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('section_name') ? ' has-error' : '' }}">
                            <label for="section_name" class="col-md-4 control-label">Jenis Model</label>

                            <div class="col-md-6">
                            <input id="section_name" type="text" class="form-control" name="section_name" value="{{ old('section_name',$category->section_name) }}">

                                @if ($errors->has('section_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('section_name') }}</strong>
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
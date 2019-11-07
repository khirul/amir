@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kemaskini Kategori</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('category/edit/'.$category->id) }}">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                            <label for="category_name" class="col-md-4 control-label">Jenis Model</label>

                            <div class="col-md-6">
                            <input id="category_name" type="text" class="form-control" name="category_name" value="{{ old('category_name',$category->category_name) }}">

                                @if ($errors->has('category_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_name') }}</strong>
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
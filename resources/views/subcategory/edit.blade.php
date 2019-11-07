@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kemaskini Kategori</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('subcategory/edit/'.$subcategory->id) }}">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('subcategory_name') ? ' has-error' : '' }}">
                            <label for="subcategory_name" class="col-md-4 control-label">Jenis Sub Model</label>

                            <div class="col-md-6">
                            <input id="subcategory_name" type="text" class="form-control" name="subcategory_name" value="{{ old('subcategory_name',$subcategory->subcategory_name) }}">

                                @if ($errors->has('subcategory_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subcategory_name') }}</strong>
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
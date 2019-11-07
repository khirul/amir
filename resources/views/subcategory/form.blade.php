@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Subseksyen</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/subcategory/add') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Seksyen</label>

                            <div class="col-md-6">
                                <select name="category" id="category" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Sila Pilih</option>    
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
                        <div class="form-group{{ $errors->has('subcategory_name') ? ' has-error' : '' }}">
                            <label for="subcategory_name" class="col-md-4 control-label">Subseksyen</label>

                            <div class="col-md-6">
                                <input id="subcategory_name" type="text" class="form-control" name="subcategory_name" value="{{ old('subcategory_name') }}">

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
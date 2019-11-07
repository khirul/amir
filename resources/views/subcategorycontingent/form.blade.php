@extends('layouts.app')

@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Subseksyen Kontinjen</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/subcategory_kontinjen/add') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('section_name') ? ' has-error' : '' }}">
                            <label for="section_name" class="col-md-4 control-label">Seksyen</label>

                            <div class="col-md-6">
                                <select name="section_name" id="section_name" class="form-control selectpicker" data-live-search="true">
                                        <option value="">Sila Pilih</option>
                                        @foreach($categories as $category)
										<option value="{{ $category->id }}">{{ $category->section_name }}</option>
										@endforeach
                                </select>

                                @if ($errors->has('section_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('section_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('subsection_name') ? ' has-error' : '' }}">
                            <label for="subsection_name" class="col-md-4 control-label">Subseksyen</label>

                            <div class="col-md-6">
                                <input id="subsection_name" type="text" class="form-control" name="subsection_name" value="{{ old('subsection_name') }}">

                                @if ($errors->has('subsection_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subsection_name') }}</strong>
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
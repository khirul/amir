@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="state/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
        <hr>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="states" style="-w 100%">
            	<thead>
            		<tr>
						<th>Bil</th>
            			<th>Negeri</th>
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
				@if($states->count() > 0)
				@if($states->count())
            	@foreach($states as $key => $negeri)
            		<tr>
						<td>{{ ++$key }}</td>
            			<td>{{ $negeri->state_name }}</td>
            			<td>
            			<a href="state/edit/{{ $negeri->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> </a> 
            			<a href="state/delete/{{ $negeri->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i> </a>
            			 </td>
            		</tr>
            	@endforeach
				@endif
				@else
				<td colspan="12"><small><strong>Tiada data</strong></small></td>
				@endif
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection

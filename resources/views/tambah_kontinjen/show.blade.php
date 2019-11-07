@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="kontinjen/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
		<hr>
		<h3>Senarai Kontinjen</h3>
		<br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="categoriesContingent" style="-w 100%">
            	<thead>
            		<tr>
						<th>Bil</th>
            			<th>Kontinjen</th>
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
				@if($categoriesContingent->count() > 0)
				@if($categoriesContingent->count())
            	@foreach($categoriesContingent as $key => $contingent)
            		<tr>
						<td>{{ ++$key }}</td>
            			<td>{{ $contingent->kontinjen_name }}</td>
            			<td>
            			<a href="kontinjen/edit/{{ $contingent->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> </a> 
            			<a href="kontinjen/delete/{{ $contingent->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i> </a>
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

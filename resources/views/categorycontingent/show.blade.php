@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="category_kontinjen/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
		<hr>
		<h3>Senarai Seksyen Kontinjen</h3>
		<br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="categories" style="-w 100%">
            	<thead>
            		<tr>
						<th>Bil</th>
            			<th>Seksyen</th>
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
				@if($categories->count() > 0)
				@if($categories->count())
            	@foreach($categories as $key => $seksyen)
            		<tr>
						<td>{{ ++$key }}</td>
            			<td>{{ $seksyen->section_name }}</td>
            			<td>
            			<a href="category_kontinjen/edit/{{ $seksyen->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> </a> 
            			<a href="category_kontinjen/delete/{{ $seksyen->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i> </a>
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

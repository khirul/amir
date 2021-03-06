@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="subcategory_kontinjen/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
		<hr>
		<h3>Senarai Subseksyen Kontinjen</h3>
		<br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="subcategories" style="-w 100%">
            	<thead>
            		<tr>
						<th>Bil</th>
						<th>Seksyen</th>
            			<th>Subseksyen</th>
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
				@if($subcategories->count() > 0)
				@if($subcategories->count())
            	@foreach($subcategories as $key => $subseksyen)
            		<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $subseksyen->Seksyen->section_name }}</td>
            			<td>{{ $subseksyen->subsection_name }}</td>
            			<td>
            			<a href="subcategory_kontinjen/edit/{{ $subseksyen->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> </a> 
            			<a href="subcategory_kontinjen/delete/{{ $subseksyen->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i> </a>
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

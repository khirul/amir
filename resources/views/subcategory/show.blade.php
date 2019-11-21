@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="subcategory/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
        <hr>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="subcategories" style="-w 100%">
            	<thead>
            		<tr>
						<th>Bil</th>
						<th>Bahagian</th>
            			<th>Seksyen</th>
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
				@if($subcategories->count() > 0)
				@if($subcategories->count())
            	@foreach($subcategories as $key => $subcategory)
            		<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $subcategory->Category->category_name }}</td>
            			<td>{{ $subcategory->subcategory_name }}</td>
            			<td>
            			<a href="subcategory/edit/{{ $subcategory->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> </a> 
            			<a href="subcategory/delete/{{ $subcategory->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i> </a>
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

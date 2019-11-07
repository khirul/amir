@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="district/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
        <hr>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="districts" style="-w 100%">
            	<thead>
            		<tr>
						<th>Bil</th>
						<th>Negeri</th>
            			<th>Daerah</th>
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
				@if($districts->count() > 0)
				@if($districts->count())
            	@foreach($districts as $key => $daerah)
            		<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $daerah->State->state_name }}</td>
            			<td>{{ $daerah->district_name }}</td>
            			<td>
            			<a href="district/edit/{{ $daerah->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> </a> 
            			<a href="district/delete/{{ $daerah->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i> </a>
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

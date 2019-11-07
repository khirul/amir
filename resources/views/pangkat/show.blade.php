@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="rank/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
        <hr>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="ranks" style="-w 100%">
            	<thead>
            		<tr>
						<th>Bil</th>
            			<th>Pangkat</th>
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
				@if($ranks->count() > 0)
				@if($ranks->count())
            	@foreach($ranks as $key => $pangkat)
            		<tr>
						<td>{{ ++$key }}</td>
            			<td>{{ $pangkat->rank_name }}</td>
            			<td>
            			<a href="rank/edit/{{ $pangkat->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i> </a> 
            			<a href="rank/delete/{{ $pangkat->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i> </a>
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

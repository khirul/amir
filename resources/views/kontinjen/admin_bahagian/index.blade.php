@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="admin_kontinjen/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah	</a>
        <hr>
		<h3>Senarai Admin Kontinjen</h3>
		<br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="penyelia">
            	<thead>
            		<tr>
						<th>Nama</th>
						<th>Penugasan</th>
						<th>Email</th>
						<th>Kontinjen</th>
						<!-- <th>Tindakan Journal</th> -->
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($penyelia as $petugas)
            		<tr>
						<td>{{ $petugas->name }}</td>
						<td>{{ $petugas->Roles->first()->name }}</td>
            			<td>{{ $petugas->email }}</td>
						<td>{{ $petugas->State->state_name }}</td>
            			<td>
            			<a href="admin_kontinjen/delete/{{ $petugas->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i></a>
            			 </td>
            		</tr>
            	@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection

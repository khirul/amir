@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="anggota/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah	</a>
        <hr>
		<h3>Senarai Anggota</h3>
		<br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="staff">
            	<thead>
            		<tr>
						<th>Nama</th>
						<th>No Badan</th>
						<th>Pangkat</th>
						<th>Jawatan</th>
						<th>Email</th>
						<th>Subseksyen</th>
            			<th>Bil Journal</th>
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
				
            	@foreach($staff as $petugas)
            		<tr>
						<td>{{ $petugas->name }}</td>
						<td>{{ $petugas->no_badan }}</td>
						<td>{{ $petugas->Pangkat->rank_name }}</td>
						<td>{{ $petugas->jawatan }}</td>
						<td>{{ $petugas->email }}</td>
						<td>{{ $petugas->Subcategory->subcategory_name }}</td>
						<td>{{ $petugas->Journal->count() }}</td>
						<!-- utk damageReport -->
            			{{--<td>{{ $petugas->DamageRpt->count() }}</td>--}}
            			<!-- ********* -->
            			<td>
            			<a href="anggota/edit/{{ $petugas->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
            			<a href="anggota/delete/{{ $petugas->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i></a>
            			 </td>
            		</tr>
            		
				@endforeach
				
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection

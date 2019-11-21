@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="pegawai_tinggi_kontinjen/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah	</a>
        <hr>
		<h3>Senarai Pegawai Tinggi</h3>
		<br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="pengawai">
            	<thead>
            		<tr>
            			<th>Nama</th>
						<th>No Badan</th>
						<th>Pangkat</th>
						<th>Jawatan</th>
						<th>Email</th>
						<th>KCK / TKCK</th>
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
					@if(Auth::user() && Auth::user()->Roles->first()->name == 'admin')
            	@foreach($pengawai as $petugas)
            		<tr>
						<td>{{ $petugas->name }}</td>
						<td>{{ $petugas->no_badan }}</td>
						<td>{{ $petugas->Pangkat->rank_name }}</td>
						<td>{{ $petugas->jawatan}}</td>
						<td>{{ $petugas->email }}</td>
						<td>{{ $petugas->State->state_name }}</td>
						{{-- <td>{{ $petugas->Kontinjen->kontinjen_name }}</td> --}}
            			<td>
            			<a href="pegawai_tinggi_kontinjen/edit/{{ $petugas->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
            			<a href="pegawai_tinggi_kontinjen/delete/{{ $petugas->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i></a>
            			 </td>
            		</tr>
				@endforeach
				@elseif(Auth::user() && Auth::user()->Roles->first()->name == 'admin_kontinjen')
				@foreach($pengawai as $petugas)
				@if($petugas->state_id == Auth::user()->state_id)
            		<tr>
						<td>{{ $petugas->name }}</td>
						<td>{{ $petugas->no_badan }}</td>
						<td>{{ $petugas->Pangkat->rank_name }}</td>
						<td>{{ $petugas->jawatan}}</td>
						<td>{{ $petugas->email }}</td>
						<td>{{ $petugas->State->state_name }}</td>
						{{-- <td>{{ $petugas->Kontinjen->kontinjen_name }}</td> --}}
            			<td>
            			<a href="pegawai_tinggi_kontinjen/edit/{{ $petugas->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
            			<a href="pegawai_tinggi_kontinjen/delete/{{ $petugas->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i></a>
            			 </td>
					</tr>
					@endif
				@endforeach
				@endif
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection

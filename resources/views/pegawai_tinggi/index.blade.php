@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="pegawai_tinggi/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah	</a>
        <hr>
		<h3>Senarai Pegawai Tinggi</h3>
		<br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="pegawai">
            	<thead>
            		<tr>
						<th>Nama</th>
						<th>Pangkat</th>
						<th>Jawatan</th>
						<th>Email</th>
						<th>KPP / PP</th>
						<!-- <th>Subseksyen</th> -->
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($pegawai as $pegawai)
            		<tr>
						<td>{{ $pegawai->name }}</td>
						<td>{{ $pegawai->Pangkat->rank_name }}</td>
						<td>{{ $pegawai->jawatan }}</td>
						<td>{{ $pegawai->email }}</td>
						<td>{{ $pegawai->Category->category_name }}</td>
						<!-- <td>{{ $pegawai->Comment->count() }}</td> -->
            			<td>
            			<a href="pegawai_tinggi/edit/{{ $pegawai->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
            			<a href="pegawai_tinggi/delete/{{ $pegawai->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i></a>
            			 </td>
            		</tr>
            	@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection

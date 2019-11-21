@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="pegawai_tinggi_daerah/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah	</a>
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
						<th>KCKD</th>
						<!-- <th>Subseksyen</th> -->
            			<th>Tindakan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
				@if(Auth::user() && Auth::user()->Roles->first()->name == 'admin')
            	@foreach($pegawai as $officer)
            		<tr>
						<td>{{ $officer->name }}</td>
						<td>{{ $officer->Pangkat->rank_name }}</td>
						<td>{{ $officer->jawatan }}</td>
						<td>{{ $officer->email }}</td>
						<td>{{ $officer->District->district_name }}</td>
						<!-- <td>{{ $officer->Comment->count() }}</td> -->
            			<td>
            			<a href="pegawai_tinggi_daerah/edit/{{ $officer->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
            			<a href="pegawai_tinggi_daerah/delete/{{ $officer->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i></a>
            			 </td>
            		</tr>
				@endforeach
				@elseif(Auth::user() && Auth::user()->Roles->first()->name == 'admin_kontinjen')
				@foreach($pegawai as $officer)
				@if($officer->state_id == Auth::user()->state_id)
				<tr>
					<td>{{ $officer->name }}</td>
					<td>{{ $officer->Pangkat->rank_name }}</td>
					<td>{{ $officer->jawatan }}</td>
					<td>{{ $officer->email }}</td>
					<td>{{ $officer->District->district_name }}</td>
					<!-- <td>{{ $officer->Comment->count() }}</td> -->
					<td>
					<a href="pegawai_tinggi_daerah/edit/{{ $officer->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
					<a href="pegawai_tinggi_daerah/delete/{{ $officer->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i></a>
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

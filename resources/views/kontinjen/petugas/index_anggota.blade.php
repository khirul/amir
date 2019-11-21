@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			@if(Auth::user()->name == 'admin')
        <a href="anggota_daerah/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah	</a>
		@endif
		<hr>
		<h3>Bilangan Artikel</h3>
		<br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="staff">
            	<thead>
            		<tr>
						<th>Bil</th>
						<th>Nama</th>
						<th>No Badan</th>
						<th>Pangkat</th>
						<th>Jawatan</th>
						<th>Email</th>
						<th>Kontinjen</th>
						<th>Subseksyen</th>
						<th>Bil Artikel</th>
						@if(Auth::user()->name == 'admin')
						<th>Tindakan</th>
						@endif
            			
            		</tr>
            	</thead>
            	<tbody>
				<?php $bil = 1 ?>
            	@foreach($staff as $petugas)
            		<tr>
						<td>{{ $bil }}</td>
						<td>{{ $petugas->name }}</td>
						<td>{{ $petugas->no_badan }}</td>
						<td>{{ $petugas->Pangkat->rank_name }}</td>
						<td>{{ $petugas->jawatan }}</td>
						<td>{{ $petugas->email }}</td>
						<td>{{ $petugas->State->state_name }}</td>
						<td>{{ $petugas->Subseksyen->subsection_name }}</td>
						{{-- <td align="center"><b><a href="anggota_kontinjen/maklumat_penuh/{{ $petugas->id }}">{{ $petugas->Journal->count() }}</a></b></td> --}}
						<td align="center">{{ $petugas->Journal->count() }}</td>
						<!-- utk damageReport -->
            			{{--<td>{{ $petugas->DamageRpt->count() }}</td>--}}
						<!-- ********* -->
						@if(Auth::user()->name == 'admin')
            			<td>
            			<a href="anggota_daerah/edit/{{ $petugas->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
            			<a href="anggota_daerah/delete/{{ $petugas->id }}" class="btn btn-danger delete btn-sm" ><i class="glyphicon glyphicon-trash"></i></a>
						 </td>
						 @endif
            		</tr>
            	<?php $bil++ ?>
				@endforeach
				
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection

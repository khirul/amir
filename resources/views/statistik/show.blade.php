@extends('layouts.app')

@section('content')
<div class="container">
		<hr>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="list" style="-w 100%">
            	<thead>
            		<tr>
						<!-- <th>Bil</th> -->
            			<th>Nama Pengguna</th>
						<th>No Tel Pengguna</th>
						<th >Bahagian / Seksyen</th>
            			<th>No Siri</th>
						<th>Sub Model</th>
						<th>Jenis Kerosakan</th>
						<th>Tarikh Masuk</th>
						<th>Status Laporan</th>
						<th>Tarikh Keluar</th>
            			<th>Anggota bertugas</th>
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($list as $course)
            		<tr>
            			<td>{{ $course->name }}</td>
						<td>{{ $course->tel }}</td>
						<td>{{ $course->bahagian }}</td>
            			<td>{{ $course->code }}</td>
						<td>{{ $course->subcategory->subcategory_name}}</td>
						<td>{{ $course->jenis_kerosakan }}</td>
						<td>{{ $course->tarikh_masuk }}</td>
						@if($course->status_laporan == '' )
						<td><p class="text-danger"><b>{{"Dalam tindakan"}}</b></p></td>
						@else
						<td><p class="text-success"><b>{{ $course->status_laporan }}</b></p></td>
						@endif
						@if($course->tarikh_keluar == 0 )
						<td><p class="text-danger"><b>{{"Sehingga selesai"}}</b></p></td>
						@else
						<td><p class="text-success"><b>{{ $course->tarikh_keluar }}</b></p></td>
						@endif
            			<td>{{ $course->Petugas->name }}</td>
            		</tr>
            	@endforeach
            	</tbody>
            </table>
            <div>Bilangan</div>   
            <small><em>{{ $list->count() }} Telah Mendaftar </em></small>
        </div>
    </div>
</div>
<style>
.th
{
	width:11%;
}
.thBahagian
{
	width:5%;
}
</style>
@endsection

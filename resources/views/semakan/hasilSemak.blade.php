@extends('layouts.app')

@section('content')
<div class="container" id="printableArea">
    <div class="row">
        <div class="col-md-11 col-md-offset-0" >
        <!-- <a href="aduan/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->
        <hr>
		<center>PC Maintenance System</center>
            <table class="table table-condensed table-bordered table-hover table-striped" id="courses" style="-w 100%">
            	<thead>
            		<tr>
            			<th>Nama Pengguna</th>
						<th class="thBahagian">Bahagian / Seksyen</th>
            			<th>No Siri</th>
						<th>Sub Model</th>
						<th>Jenis Kerosakan</th>
						<th>Tarikh Masuk</th>
						<th>Status Laporan</th>
						<th>Tarikh Keluar</th>
            			<th>Anggota bertugas</th>
            			<th>No Talian</th>
						<!-- <th class="thCetak">Cetak</th> -->
						<th class="thCetak">Cetak</th>
            			
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($courses as $course)
            		<tr>
            			<td>{{ $course->name }}</td>
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
            			<td>0322665587</td>
						<!-- <td class="tdHide"><a href="" class="btn btn-info btn-sm" onclick="print_laporanE7d('printableArea')"><i class="glyphicon glyphicon-print"></i> </a> </td> -->
						<script>
						function print_laporanE7d(printableArea) {
						// var table = $('#dataTables-example').DataTable();
						// table.destroy();
						$(".close, .thCetak, .tdHide").hide();
						var printContents = document.getElementById(printableArea).innerHTML;
						var originalContents = document.body.innerHTML;
						document.body.innerHTML = printContents;
						window.print();
						location.reload(document.body.innerHTML = originalContents);
						}
						</script>
						<td><a href="/semakan/hasil_semakan/{{ $course->id }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-print"></i> </a></td>
					</tr>
            		
            	@endforeach
            	</tbody>
            </table>
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

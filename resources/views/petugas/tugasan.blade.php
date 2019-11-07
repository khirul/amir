@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <h2>Senarai Penugasan</h2>
        <hr>
            <table class="table table-condensed table-hover table-striped dt" id="staff">
            	<thead>
            		<tr>
                        <th>Model</th>
            			<th>No Siri</th>
                        <th>Name Pengguna</th>
                        <th>Jabatan / Seksyen</th>
            			<th>Status Laporan</th>
            			
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($staff->DamageRpt as $tugasan)
            		<tr>
                        <td>{{ $tugasan->Subcategory->subcategory_name }}</td>
                        <td>{{ $tugasan->code }}</td>
                        <td>{{ $tugasan->name }}</td>
                        <td>{{ $tugasan->bahagian }}</td>
                        @if($tugasan->status_laporan == '' )
                        <td><p class="text-danger"><b>{{"Dalam tindakan"}}</b></p></td>
                        @else
						<td><p class="text-success"><b>{{ $tugasan->status_laporan }}</b></p></td>
						@endif
            			
            		</tr>
            		
            	@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection

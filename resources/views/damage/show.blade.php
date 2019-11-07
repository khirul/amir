@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-pull-0">
            <a href="laporan_kerosakan/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
            <hr>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="damageRpt"
                style="-w 100%">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama Pengguna</th>
                        <th>No Tel Pengguna</th>
                        <th>Bahagian / Seksyen</th>
                        <th>No Siri</th>
                        <th>Sub Model</th>
                        <th>Jenis Kerosakan</th>
                        <th>Tarikh Masuk</th>
                        <th>Anggota bertugas</th>
                        <th>Status</th>
                        <th>Tarikh Keluar</th>
                        <th>Catatan</th>
                        <th class="th">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $bil = 1 ?>
                    @foreach($damageRpt as $laporan)
                    <tr>
                        <td>{{ $bil }}</td>
                        <td>{{ $laporan->name }}</td>
                        <td>{{ $laporan->tel }}</td>
                        <td>{{ $laporan->bahagian }}</td>
                        <td>{{ $laporan->code }}</td>
                        <td>{{ $laporan->Subcategory->subcategory_name }}</td>
                        <td>{{ $laporan->jenis_kerosakan }}</td>
                        <td>{{ $laporan->tarikh_masuk }}</td>
                        <td>{{ $laporan->Petugas->name }}</td>
                        @if($laporan->status_laporan == '' )
                        <td>
                            <p class="text-danger"><b>{{ "Dalam Tindakan" }}</b></p>
                        </td>
                        @else
                        <td>
                            <p><b><a href="laporan/maklumat_penerima/{{ $laporan->id }}" class="text-success">{{
                                        $laporan->status_laporan }}</b></p>
                        </td>
                        @endif
                        @if($laporan->tarikh_keluar == 0 )
                        <td>
                            <p class="text-danger"><b>{{ "Sehingga Selesai" }}</b></p>
                        </td>
                        @else
                        <td>
                            <p class="text-success"><b>{{ $laporan->tarikh_keluar }}</b></p>
                        </td>
                        @endif
                        @if($laporan->status_laporan == '' )
                        <td>
                            <p>{{ "Tiada" }}</p>
                        </td>
                        @else
                        <td>
                            <p><b>{{ $laporan->tindakan }}</b></p>
                        </td>
                        @endif
                        <td>
                            <a href="laporan_kerosakan/edit/{{ $laporan->id }}" class="btn btn-info btn-sm"><i
                                    class="glyphicon glyphicon-wrench"></i>
                            </a>
                            <a href="laporan/tindakan/{{ $laporan->id }}" class="btn btn-info btn-sm"><i
                                    class="glyphicon glyphicon-check"></i>
                            </a>
                            <a href="laporan_kerosakan/delete/{{ $laporan->id }}"
                                class="btn btn-danger delete btn-sm"><i class="glyphicon glyphicon-trash"></i> </a>
                        </td>
                    </tr>
                    <?php $bil++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .th {
        width: 11%;
    }

    .thBahagian {
        width: 5%;
    }

</style>
@endsection

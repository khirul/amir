@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-pull-0">
        @if(Auth::guest() || Auth::user()->Roles->first()->name == 'petugas')
            <a href="journal/add" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Penghasilan Jurnal Baru" data-original-title=""><i class="glyphicon glyphicon-plus"></i> Tambah</a>
            <hr>
            @endif
            <h3>Senarai Jurnal</h3>
            <br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="journalRpt"
                style="-w 100%">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Tajuk</th>
                        <th>Rujukan Fail</th>
                        <th>Jenis Laporan</th>
                        <th>Anggota</th>
                        <th>Pegawai Penyelia 1</th>
                        <th>Kategori</th>
                        @if(Auth::guest() || Auth::user()->Roles->first()->name == 'petugas')
                        <th>Tindakan</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <?php $bil = 1 ?>
                    @foreach($journalRpt as $journal)
                    <tr>
                        <td>{{ $bil }}</td>
                        <td>
                            <p data-toggle="tooltip" data-placement="top" title="Maklumat terperinci" data-original-title=""><b><a href="/journal/action/{{ $journal->id }}" class="text-primary">{{
                                        $journal->tajuk_journal }}</b></p>
                        </td>
                        <td>{{ $journal->rujukan_fail }}</td>
                        <td>{{ $journal->tajuk_artikel }}</td>
                        <td>{{ $journal->User->name }}</td>
                        <td>{{ $journal->nama_penyelia() }}</td>
                        @if($journal->tindakan == '')
                        <td>
                            <p class="text-danger" data-toggle="tooltip" data-placement="top" title="Tindakan Pegawai Penyelia II" data-original-title=""><b>{{ "Dalam Tindakan" }}</b></p>
                        </td>
                        @else
                        <td>
                            <p class="text-success"><b>{{ $journal->tindakan }}</b></p>
                        </td>
                        @endif
                        @if(Auth::guest() || Auth::user()->Roles->first()->name == 'petugas')
                        <td>
                            <a href="journal/edit/{{ $journal->id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Kemaskini" data-original-title=""><i
                                    class="glyphicon glyphicon-wrench"></i>
                            </a>
                            <a href=""
                                class="btn btn-danger delete btn-sm" data-toggle="modal" data-target="#myModal_delete"><i data-toggle="tooltip" data-placement="top" title="Hapus" data-original-title="" class="glyphicon glyphicon-trash"></i> 
                            </a>
                            <a href="/view/{{ $journal->id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right" title="Cetak" data-original-title=""><i class="glyphicon glyphicon-print"></i></a>
                        </td>
                        @endif
                    </tr>
                    <?php $bil++ ?>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <!-- The Modal -->
            <div class="modal fade" id="myModal_delete">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h5 class="modal-title"><b>Hapus Data</b></h5>
                    </div>
                    <div class="modal-body">
                      <p> Anda pasti untuk hapuskan data?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                      @if(count($journalRpt)>0)
                      <a href="journal/delete/{{ $journal->id }}"
                        class="btn btn-danger delete btn-sm">Hapus</a>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            <br>
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

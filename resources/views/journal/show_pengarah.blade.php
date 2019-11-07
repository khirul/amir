@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-pull-0">
        @if(Auth::guest() || Auth::user()->Roles->first()->name == 'petugas')
            <a href="journal/add" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
        @endif
            <hr>
            <h3>Senarai Journal</h3>
            <br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="pengarahRpt"
                style="-w 100%">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Tajuk</th>
                        <th>Anggota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $bil = 1 ?>
                    @foreach($pengarahRpt as $journal)
                    <tr>
                        <td>{{ $bil }}</td>
                        <td>
                            <p><b><a href="/journal/action/{{ $journal->id }}" class="text-primary">{{
                                        $journal->tajuk_journal }}</b></p>
                        </td>
                        {{--<td>{{ $journal->tajuk_journal }}</td>--}}
                        <td>{{ $journal->User->name }}</td>
                        {{--@if($journal->tindakan_penyelia == '' )
                        <td>
                            <p class="text-danger"><b>{{ "Dalam Proses" }}</b></p>
                        </td>
                        @else
                        <td>
                        <p class="text-success"><b>{{ "Telah Disemak" }}</b></p>
                        </td>
                        @endif--}}
                        {{--@if($laporan->tarikh_keluar == 0 )
                        <td>
                            <p class="text-danger"><b>{{ "Sehingga Selesai" }}</b></p>
                        </td>
                        @else
                        <td>
                            <p class="text-success"><b>{{ $laporan->tarikh_keluar }}</b></p>
                        </td>
                        @endif--}}
                        {{--<td>
                            <a href="journal/edit/{{ $journal->id }}" class="btn btn-info btn-sm"><i
                                    class="glyphicon glyphicon-wrench"></i>
                            </a>
                            <a href="laporan/tindakan/{{ $laporan->id }}" class="btn btn-info btn-sm"><i
                                    class="glyphicon glyphicon-check"></i>
                            </a>
                            <a href="journal/delete/{{ $journal->id }}"
                                class="btn btn-danger delete btn-sm"><i class="glyphicon glyphicon-trash"></i> </a>
                        </td>--}}
                    </tr>
                    <?php $bil++ ?>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h3></h3>
            <br>
            @if(Auth::user()->Roles->first()->name == 'penyelia')
            <h3>Senarai Journal SK</h3>
            <br>
            <table class="table table-condensed table-bordered table-hover table-striped dt" id="other_journal"
                style="-w 100%">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Tajuk</th>
                        <th>Anggota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $bil = 1 ?>
                    @foreach($other_journal as $journal)
                    <tr>
                        <td>{{ $bil }}</td>
                        <td>
                            <p><b><a href="/journal/action/{{ $journal->id }}" class="text-primary">{{
                                        $journal->tajuk_journal }}</b></p>
                        </td>
                        {{--<td>{{ $journal->tajuk_journal }}</td>--}}
                        <td>{{ $journal->User->name }}</td>
                        {{--@if($journal->tindakan_penyelia == '' )
                        <td>
                            <p class="text-danger"><b>{{ "Dalam Proses" }}</b></p>
                        </td>
                        @else
                        <td>
                        <p class="text-success"><b>{{ "Telah Disemak" }}</b></p>
                        </td>
                        @endif--}}
                        {{--@if($laporan->tarikh_keluar == 0 )
                        <td>
                            <p class="text-danger"><b>{{ "Sehingga Selesai" }}</b></p>
                        </td>
                        @else
                        <td>
                            <p class="text-success"><b>{{ $laporan->tarikh_keluar }}</b></p>
                        </td>
                        @endif--}}
                        {{--<td>
                            <a href="journal/edit/{{ $journal->id }}" class="btn btn-info btn-sm"><i
                                    class="glyphicon glyphicon-wrench"></i>
                            </a>
                            <a href="laporan/tindakan/{{ $laporan->id }}" class="btn btn-info btn-sm"><i
                                    class="glyphicon glyphicon-check"></i>
                            </a>
                            <a href="journal/delete/{{ $journal->id }}"
                                class="btn btn-danger delete btn-sm"><i class="glyphicon glyphicon-trash"></i> </a>
                        </td>--}}
                    </tr>
                    <?php $bil++ ?>
                    @endforeach
                </tbody>
            </table>
            @endif
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

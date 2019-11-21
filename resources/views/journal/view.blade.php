@extends('layouts.app')
@section('content')
<style>
    .table{
        text-align: justify;
    }
    /* hilangkan border atas */
    .table>tbody>tr>td{
        border: 0px solid ;
    }
    .table>tbody>tr>th{
        border: 0px solid ;
    }
    /* ********* */
</style>
<div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="jumbotron">
                    <fieldset>
                        <legend>Papar Cetak Jurnal</legend>
                        <table class="table table-borderless" style="">
                        <tr>
                            <th width="12%;">Tajuk</th>
                            <td colspan="2">{{$journal->tajuk_journal}}</td>
                        </tr>
                        <tr>
                            <th>Tarikh</th>
                            <td colspan="2">{{ \Carbon\Carbon::parse($journal->tarikh_journal)->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <th>Arahan</th>
                            @if($journal->arahan == '')
                            <td colspan="2">Tiada</td>
                            @else
                            <td colspan="2">{{ $journal->arahan }}</td>
                            @endif
                        </tr>
                        <tr><th colspan="3">Tindakan</th></tr>
                        <?php $bil = 1 ?>
                            @foreach($journal->article as $listJournal)
                        <tr>
                            <th>&nbsp;</th>
                            <td colspan="2">{{ $bil }}.&nbsp;&nbsp;{{$listJournal->artikel}}</td>
                        </tr>
                        <?php $bil++ ?>
                            @endforeach
                        <tr>
                            <th>Rujukan Fail</th>
                            <td colspan="2">{{$journal->rujukan_fail}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><a href="{{route('journal.view_print',$journal->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Cetak" data-original-title=""><i class="glyphicon glyphicon-print"></i> Cetak</a></td>
                        </tr>
                        </table>
                    </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection
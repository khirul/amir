<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- if want to use bootstrap..insert boostrap_link here -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-paper.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="{{asset('css/paper.css')}}">
    <title>Paparan Cetak Jurnal</title>
</head>

<body class="A4">
    <section class="sheet padding-10mm">
            <div class=" logo  d-flex justify-content-center">
                    <img src="{{ asset('images/journal_v1.jpg') }}" height="70px" width="100%">
                </div>
        <div class="title">
            {{-- <h5>Maklumat Penuh Jurnal</h5> --}}
        </div><br/>
                <div class="container-fluid">
                        <div class="row">
                                <br/>
                                <div class="col-md-12 space"><strong>Tajuk</strong></div>
                                <div class="col-md-12">{{$journal->tajuk_journal}}</div>
                            </div>
                            <br/>
                        <div class="row">
                            <div class="col-md-12 space"><strong>Tarikh</strong></div>
                            <div class="col-md-12">{{ \Carbon\Carbon::parse($journal->tarikh_journal)->format('d M Y')}}</div>
                        </div>
                        <br/>
                        <div class="row">
                                <div class="col-md-12 space"><strong>Arahan</strong></div>
                                @if($journal->arahan == '')
                                <div class="col-md-12">Tiada</div>
                                @else
                                <div class="col-md-12">{{ $journal->arahan }}</div>
                                @endif
                            </div>
                            <br/>
                            <div class="row">
                                    <div class="col-md-12 space"><strong>Jenis Laporan</strong></div>
                                    <div class="col-md-12">{{ $journal->tajuk_artikel }}</div>
                                </div>
                                <br/>
                            <div class="row">
                                    <div class="col-md-12 space"><strong>Tindakan</strong></div>
                                    <div class="col-md-12">
                                        <table class="table table-borderless artikel" width="100%">
                                            <?php $bil = 1 ?>
                                            @foreach($journal->article as $listJournal)
                                            <tr>
                                                <td>{{ $bil }}.</td>
                                                <td>{{$listJournal->artikel}}</td>
                                            </tr>
                                            <?php $bil++ ?>
                                            @endforeach
                                        </table>
                                    {{-- <div class="col-md-12">{{ $bil }}.&nbsp;&nbsp;{{$listJournal->artikel}}</div> --}}
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                        <div class="col-md-12 space"><strong>Rujukan Fail</strong></div>
                                        <div class="col-md-12">{{$journal->rujukan_fail}}</div>
                                    </div>
                                    <br/>
                                    @if($journal->article->count() >3)
                                        <div class="page-break"></div>
                                        @endif
                                    <div class="row">
                                            <div class="col-md-12 space"><strong>Ulasan Pegawai Penyelia</strong></div>
                                            <div class="col-md-12"><table class="table table-bordered ulasan" height="100px;"><tr><td></td></tr></table></div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                                <div class="col-md-12">
                                                <table class="table table-borderless anggota" width="100%">
                                                    <tr>
                                                        <td width="50%"><strong>Anggota</strong></td>
                                                        <td align="center"><strong>Pegawai Penyelia</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>.............................</td>
                                                        <td align="center">.............................</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $journal->User->name}}</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $journal->User->jawatan}},</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td>Cawangan Khas,</td>
                                                        <td>&nbsp;</td>
                                                    </tr> --}}
                                                    <tr>
                                                        @if($journal->User->cawangan == "Bukit Aman")
                                                        <td>{{ $journal->User->cawangan}}</td>
                                                        @elseif($journal->User->cawangan == "Daerah")
                                                        <td>{{ $journal->User->cawangan}} {{ $journal->User->District->district_name  }}</td>
                                                        @elseif($journal->User->cawangan == "Kontinjen")
                                                        <td>{{ $journal->User->cawangan}} {{ $journal->User->State->state_name }}</td>
                                                        @endif
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                                </div>
                                            </div>
                </div>
                <br/>
                              {{-- ------finish------- --}}
                <div class="row">
                    <div class="col-md-offset-5">
                        <input type="button" class="btn btn-default" onclick="location.href='{{route('journal.show',$journal->id)}}';"
                            value="Kembali" />
                        <button class="btn btn-default" onclick="myFunction()">
                            Cetak
                        </button>
                    </div>
                </div>
    </section>
    <script>
        function myFunction() {
            window.print();
        }

    </script>
    <style>
        .container-fluid{
            text-align: justify;
            color: #000;
            font-size: 12pt;
            line-height: 1.3;
            background: #fff !important;
            font-family: Arial, Helvetica, sans-serif;
        }
        .title {
            text-align: center;

        }

        @media print {
            button.btn {
                display: none;
            }

            input.btn {
                display: none;
            }
        }

        /* .page-break-before {
            page-break-before: always !important;
        } */

        .anggota>tbody>tr>td{
            line-height: 0.5; 
            border-top: 0px solid #fff;
        }

        .space{
            padding-bottom: 5px;
        }

        .artikel>tbody>tr>td{
            border-top: 0px solid #fff;
        }   
        .ulasan>tbody>tr>td{
            height:100px;
            /* overflow:auto;
            overflow-x:hidden; */
            border: 1px solid black;
        }
    </style>
</body>

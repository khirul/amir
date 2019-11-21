@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                {{-- <div class="panel-heading">Maklumat Penuh</div> --}}
                <div class="panel-body">
                    <h3>Maklumat Penuh</h3>
                <hr/>
                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ url('/anggota_kontinjen/maklumat_penuh'.$petugas->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Laporan Siasatan</label>
                            <div class="col-md-6">
                                <input id="name" type="text" readonly="readonly" class="form-control" name="name"
                                    value="{{ $siasatan }}">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Pertemuan Sumber</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" readonly="readonly" class="form-control" name="name"
                                        value="{{ $petugas->Journal->count() }}">
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="/laporan_kerosakan"><button type="button"
                                        class="btn btn-success">Kembali</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a:link {
        color: white;
        text-align: center;
    }

</style>

@endsection

@extends('layouts.app')

@section('content')
	
<div class="container " id="printableArea">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Salinan Laporan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('semakan/hasil_semakan/'.$course->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama Pengguna</label>
                            <div class="col-md-6">
                                <input id="name" type="text" readonly="readonly" class="form-control" name="name" value="{{ old('name',$course->name) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tel" class="col-md-4 control-label">No Telefon Pengguna</label>
                            <div class="col-md-6">
                                <input id="tel" type="text" readonly="readonly" class="form-control" name="tel" value="{{ old('tel',$course->tel) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bahagian" class="col-md-4 control-label">Bahagian / Seksyen</label>
                            <div class="col-md-6">
                                <input id="bahagian" type="text" readonly="readonly" class="form-control" name="bahagian" value="{{ old('bahagian',$course->bahagian) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">No Siri</label>
                            <div class="col-md-6">
                                <input id="code" type="text" readonly="readonly" class="form-control" name="code" value="{{ old('code',$course->code) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-md-4 control-label">Model</label>
                            <div class="col-md-6">
                                <input id="category" type="text" readonly="readonly" class="form-control" name="category" value="{{ old('category_name',$course->category->category_name) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subcategory" class="col-md-4 control-label">Sub Model</label>
                            <div class="col-md-6">
                                <input id="subcategory" type="text" readonly="readonly" class="form-control" name="subcategory" value="{{ old('subcategory_name',$course->subcategory->subcategory_name) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kerosakan" class="col-md-4 control-label">Jenis Kerosakan</label>
                            <div class="col-md-6">
                                <input id="jenis_kerosakan" type="text" readonly="readonly" class="form-control" name="jenis_kerosakan" value="{{ old('jenis_kerosakan',$course->jenis_kerosakan) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status_laporan" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            @if($course->status_laporan == '' )
                                <input type="text" readonly="readonly" class="form-control" value="{{"Dalam tindakan"}}">
                                @else
                                <input id="status_laporan" type="text" readonly="readonly" class="form-control" name="status_laporan" value="{{ old('status_laporan',$course->status_laporan) }}">
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tarikh_masuk" class="col-md-4 control-label">Tarikh Masuk</label>
                            <div class="col-md-6">
                                <input id="tarikh_masuk" type="text" readonly="readonly" class="form-control" name="tarikh_masuk" value="{{ old('tarikh_masuk',$course->tarikh_masuk) }}">
                            </div>
                        </div>

                        <div class="form-group divHide">
                            <div class="col-md-6 col-md-offset-4">
                            <a href="" class="btn btn-info btn-sm" onclick="print_laporanE7d('printableArea')"><i class="glyphicon glyphicon-print"></i> Cetak </a>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" id="hidden_div">
                            <label for="penerima" class="col-md-4 control-label">Penerima</label>
                            <div class="col-md-6">
                            <br>
                                <span>----------------------------</span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="penerima" class="col-md-4 control-label">Anggota Bertugas</label>
                            <div class="col-md-6">
                            <br>
                                <span>----------------------------</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>
<script>
	function print_laporanE7d(printableArea) {
	// var table = $('#dataTables-example').DataTable();
	// table.destroy();
	$(".close, .thCetak, .divHide").hide();
	var printContents = document.getElementById(printableArea).innerHTML;
	// var originalContents = document.body.innerHTML;
	document.body.innerHTML = printContents;
	window.print();
	// location.reload(document.body.innerHTML = originalContents);
	}
</script>

@endsection
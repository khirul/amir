@extends('layouts.app')

@section('content')
<style>
.jumbotron{
    -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.20);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.20);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.20);
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="jumbotron">
                    <div class="text-right">
                          <span class="text-primary"><b>Perhatian : </b>Sila masukkan maklumat pada ruangan yang disediakan.</span>
                    </div>
                    <br/>
                <legend>Jurnal Baru</legend>
                <div class="alert alert-info" role="alert">Yang bertanda <strong>*</strong> adalah mandatori.</div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/journal/add') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('tajuk_journal') ? ' has-error' : '' }}">
                            <label for="tajuk_journal" class="col-md-2 control-label"><b>Tajuk *</b></label>

                            <div class="col-md-10">
                                <input id="tajuk_journal" type="text" class="form-control" name="tajuk_journal"
                                    value="{{ old('tajuk_journal') }}">

                                @if ($errors->has('tajuk_journal'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tajuk_journal') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('arahan') ? ' has-error' : '' }}">
                            <label for="arahan" class="col-md-2 control-label"><b>Arahan</b></label>

                            <div class="col-md-10">
                                <textarea class="form-control" name="arahan" id="arahan" cols="10" rows="5" placeholder="Arahan yang diberi">{{ old('arahan') }}</textarea>
                                @if ($errors->has('arahan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('arahan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tajuk_artikel') ? ' has-error' : '' }}">
                            <label for="tajuk_artikel" class="col-md-2 control-label"><b>Jenis Laporan</b></label>
                            <div class="col-md-10 {{ $errors->has('tajuk_artikel') ? ' has-error' : '' }}">
                                <select name="tajuk_artikel" class="form-control selectpicker"
                                    data-live-search="true">
                                    <option value="">Sila Pilih</option>
                                <option value="Laporan Siasatan">Laporan Siasatan</option>
                                <option value="Laporan Maklumat">Laporan Maklumat</option>
                                <option value="Laporan Reaksi">Laporan Reaksi</option>
                                {{-- <option value="Lain-lain">Lain-lain</option> --}}
                                </select>
                                @if ($errors->has('tajuk_artikel'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tajuk_artikel') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('artikel') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label"><b>Tindakan / <br>Maklumat / <br>Reaksi *&nbsp;&nbsp;</b></label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="artikel" id="artikel" cols="30" rows="3" placeholder="Tindakan / Maklumat / Reaksi">{{ old('artikel') }}</textarea>
                                <small>Tindakan anggota</small>
                                @if ($errors->has('artikel'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('artikel') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tarikh_journal') ? ' has-error' : '' }}">
                            <label for="tarikh_journal" class="col-md-2 control-label"><b>Tarikh *</b></label>

                            <div class="col-md-6">
                                <input id="tarikh_journal" type="date" class="form-control" name="tarikh_journal" value="{{ old('tarikh_journal') }}">

                                @if ($errors->has('tarikh_journal'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tarikh_journal') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('rujukan_fail') ? ' has-error' : '' }}">
                            <label for="rujukan_fail" class="col-md-2 control-label"><b>Rujukan Fail*</b></label>

                            <div class="col-md-6">
                                <input id="rujukan_fail" type="text" class="form-control" name="rujukan_fail"
                                    value="{{ old('rujukan_fail') }}">

                                @if ($errors->has('rujukan_fail'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rujukan_fail') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- penyelia -->
                        <div class="form-group{{ $errors->has('penyelia') ? ' has-error' : '' }}">
                            <label for="penyelia" class="col-md-2 control-label"><b>Penyelia 1 *</b></label>

                            <div class="col-md-10">
                                <select name="penyelia" id="penyelia" class="form-control selectpicker" data-live-search="true">
                                    <option value="">Sila Pilih</option>
                                    @foreach($penyelia as $penyelia)
                                    <option value="{{ $penyelia->id }}">{{ $penyelia->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('penyelia'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('penyelia') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- *********** -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    Hantar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function CheckInput(val){
 var element=document.getElementById('lain2');
 if(val=='Sila Pilih'||val=='Lain-lain')
   element.style.display='block';
 else  
   element.style.display='none';
}
</script>

@endsection

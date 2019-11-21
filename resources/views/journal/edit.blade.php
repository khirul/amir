@extends('layouts.app')

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
        .panel-body{
            -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.20);
        -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.20);
        box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.20);
        }
        </style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                        <div class="text-right">
                                <p class="text-right"><span class="label label-info" style="font-size:11px;">Perhatian : Sila masukkan maklumat pada ruangan yang disediakan.</span></p>
                            </div>
                          <br/>
                      <legend>Kemaskini Jurnal</legend>
                      <div class="alert alert-info" role="alert">Yang bertanda <strong>*</strong> adalah mandatori.</div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('journal/edit/'.$journal->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('tajuk_journal') ? ' has-error' : '' }}">
                            <label for="tajuk_journal" class="col-md-2 control-label"><b>Tajuk *</b></label>

                            <div class="col-md-8">
                            <input id="tajuk_journal" type="text" class="form-control" name="tajuk_journal" value="{{ old('tajuk_journal',$journal->tajuk_journal) }}" required>
                                @if ($errors->has('tajuk_journal'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tajuk_journal') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('arahan') ? ' has-error' : '' }}">
                            <label for="arahan" class="col-md-2 control-label"><b>Arahan</b></label>

                            <div class="col-md-8">
                            <textarea class="form-control" name="arahan" id="arahan" cols="30" rows="5" placeholder="Your article here">{{ old('arahan',$journal->arahan) }}</textarea>
                            @if ($errors->has('arahan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('arahan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tajuk_artikel') ? ' has-error' : '' }}">
                                <label for="tajuk_artikel" class="col-md-2 control-label"><b>Jenis Laporan</b></label>
                                <div class="col-md-8 {{ $errors->has('tajuk_artikel') ? ' has-error' : '' }}">
                                    <select name="tajuk_artikel" class="form-control selectpicker"
                                        data-live-search="true" required>
                                    <option value="">Sila Pilih</option>
                                    <option value="Laporan Siasatan" @if($journal->tajuk_artikel=="Laporan Siasatan")selected
                                        @endif>Laporan Siasatan</option>
                                    <option value="Laporan Maklumat" @if($journal->tajuk_artikel=="Laporan Maklumat")selected
                                        @endif>Laporan Maklumat</option>
                                    <option value="Laporan Reaksi" @if($journal->tajuk_artikel=="Laporan Reaksi")selected
                                        @endif>Laporan Reaksi</option>
                                        <option value="Tugas Litupan / Operasi" @if($journal->tajuk_artikel=="Tugas Litupan / Operasi")selected
                                        @endif>Tugas Litupan / Operasi</option>
                                    <option value="Pertemuan Sumber" @if($journal->tajuk_artikel=="Pertemuan Sumber")selected
                                        @endif>Pertemuan Sumber</option>
                                    <option value="Pemeriksaan Penerbitan" @if($journal->tajuk_artikel=="Pemeriksaan Penerbitan")selected
                                        @endif>Pemeriksaan Penerbitan</option>
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
                                    <label for="artikel" class="col-md-2 control-label"><b>Tindakan / <br>Maklumat / <br>Reaksi *&nbsp;&nbsp;</b></label>
                                    <div class="col-md-9">
                                    <table class="table table-bordered" id="dynamic_field10">
                                        <tr class="table-primary">
                                                <th class="active"><label for="kursus"><small>Sila tekan butang tambah untuk penambahan</small></label></th>
                                                 <td style="border-color:#fff; background-color:#ffff">
                                                    @foreach($journal->article as $button_article)
                                                    @if($button_article->artikel != '')
                                                        <button type="button" name="addKursus" id="addKursus" class="btn btn-primary btn-sm bi">
                                                            <i class="fas fa-plus-circle"
                                                            data-toggle="tooltip" data-placement="top" title="Tambah" data-original-title=""></i></button>
                                                    @endif
                                                    @endforeach
                                                    <script>
                                                            $(document).ready(() => {
                                                                var button = $('.bi').length
                                                                $('.bi').not(':first').remove()
                                                                console.log(button)
                                                            })
                
                                                        </script>
                                                </td>
                                        </tr>
                                        @foreach($journal->article as $detail_article)
                                        <tr id="detail{{ $detail_article->id }}"</tr>
                                            <td style="width: 100%">
                                                <textarea class="form-control" name="artikel[]"
                                                    id="artikel" required>{{ old('artikel',$detail_article->artikel) }}</textarea>
                                            </td>
                                            <td style="border-color:#fff; background-color:#ffff">
                                                <button type="button" name="remove" class="btn btn-danger btn-sm btn_remove_artikel">
                                                <i class="fas fa-minus-circle"></i>
                                                </button>
                                                </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    </div>
                                </div>
                            {{-- @foreach($journal->article as $list_artikel)
                            <div class="form-group {{ $errors->has('artikel') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label"><b>Tindakan / <br>Maklumat / <br>Reaksi *&nbsp;&nbsp;</b></label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="artikel[]"
                                        id="artikel" placeholder="Maklumat Keselamatan"
                                        required>{{ old('artikel',$list_artikel->artikel) }}</textarea>
                                         @if ($errors->has('artikel'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('artikel') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endforeach --}}
                        <div class="form-group {{ $errors->has('tarikh_journal') ? ' has-error' : '' }}">
                            <label for="tarikh_journal" class="col-md-2 control-label"><b>Tarikh *</b></label>

                            <div class="col-md-6">
                                <input id="tarikh_journal" type="date" class="form-control" name="tarikh_journal" value="{{ old('tarikh_journal',$journal->tarikh_journal) }}" required>
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
                                <input id="rujukan_fail" type="text" class="form-control" name="rujukan_fail" value="{{ old('rujukan_fail',$journal->rujukan_fail) }}" required>
                                @if ($errors->has('rujukan_fail'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rujukan_fail') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('penyelia') ? ' has-error' : '' }}">
                            <label for="penyelia" class="col-md-2 control-label"><b>Penyelia 1 *</b></label>
                            <div class="col-md-8">
                                <select name="penyelia" id="penyelia" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">Sila Pilih</option>
                                    @foreach($staff as $petugas)
												<option value="{{ $petugas->id }}" 
                                                @if (old('penyelia',$journal->penyelia) == $petugas->id ) selected="selected" 
                                                @endif >{{ $petugas->name }}
                                                </option>
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
                                    Kemaskini
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
    $(document).ready(function () {
        var postURL = "<?php echo url('addmore'); ?>";
        var h = 1;

        $('#addKursus').click(function () {
            h++;
            $('#dynamic_field10').append('<tr id="rowArtikel' + h +
                '" class="dynamic-added">\
                <td>\
                <textarea class="form-control" name="artikel[]" id="artikel" rows="3"></textarea>\
                </td>\
                <td style="border-color:#fff; background-color:#ffff">\
                <button type="button" name="remove" id="' +
                h +
                '" class="btn btn-danger btn-sm btn_remove">\
                <i class="fas fa-minus-circle"></i>\
                </button>\
                </td>\
                </tr>');
        });

        
    $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#rowArtikel' + button_id + '').remove(); 
      }); 

      $(document).on('click', '.btn_remove_artikel', function(event){  
        var tr_id = $(this).parent().parent().attr('id');    
        $("#"+tr_id).remove();
      }); 
    });
    </script>
@endsection

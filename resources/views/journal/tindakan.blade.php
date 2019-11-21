@extends('layouts.app')

@section('content')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
					<h4>{{ $journal->tajuk_journal }}</h4>
					<h5>{{ \Carbon\Carbon::parse($journal->created_at)->format('d M Y')}}</h5>
					<hr>
				<div class="panel-group">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('journal/action/'.$journal->id) }}">
                        {{ csrf_field() }}
						<div class="panel panel-default">
                            <div class="panel-body">
							<h5><small><i>Arahan</i></small></h5>
							@if($journal->arahan != '')
								<p>{{ $journal->arahan }}</p>
								@else
								<p>Tiada</p>
								@endif
                                <hr>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-body">
							<h5><small><i>Tindakan</i></small></h5>
							<p>{{ $journal->tajuk_artikel }}</p>
							<?php $bil = 1 ?>
							@foreach($journal->article as $listJournal)
								<p>{{ $bil }}.&nbsp;&nbsp;{{ $listJournal->artikel }}</p>
								<?php $bil++ ?>
								@endforeach
								<small><i>{{ \Carbon\Carbon::parse($journal->tarikh_journal)->format('d M Y')}}</i></small>
								<small style="padding-left:50px;"><i>Rujukan fail : {{$journal->rujukan_fail}}</i></small>
                                <hr>
                                <a href="{{ url('journal') }}" class="btn btn-link"><p class="text-primary"><i class="fa fa-undo" aria-hidden="true"></i> Kembali ke senarai paparan</p></a>
                            </div>
                        </div>
                    </form>
                <br>
                <hr>
				<!-- filter user-ba yg nk show -->
				@if(Auth::user()->cawangan == 'Bukit Aman')
				@if(Auth::user()->SubCategory->id == $journal->User->subcategory_id)
				<h4>Ulasan Pegawai Penyelia</h4>					
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-1">
							<i class="glyphicon glyphicon-pencil"></i>
								<!-- <img src="http://placehold.it/48x48" alt=""> -->
							</div>
							<div class="col-xs-11">
								@if( Auth::user()->Roles->first()->name == 'penyelia' || Auth::user()->id == $journal->penyelia && Auth::user()->Roles->first()->name == 'pemproses' )
								<form method="POST" action="{{ route('articles.comment', $journal->id) }}">
										{{ csrf_field() }}
										<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
											<textarea class="form-control comment-box" cols="30" rows="10" name="comment" placeholder="Masukkan ulasan di sini...">{{ old('comment') }}</textarea>
											@if($errors->has('comment'))
				                                <span class="help-block">
				                                    <strong>{{ $errors->first('comment') }}</strong>
				                                </span>
				                            @endif
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-success btn-sm" value="Tambah">
										</div>
									</form>
								@else
								<div class="form-group">
										<textarea disabled class="form-control comment-box" cols="30" rows="10" placeholder="Ruangan pegawai penyelia sahaja!"></textarea>
									</div>
									<div class="form-group">
										<input disabled type="submit" class="btn btn-primary" value="Tambah">
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				<br>
                <hr>
				@if(in_array('penyelia', $roles))
				<h4>Penilaian Kerja</h4>
				<form class="form-horizontal" role="form" method="POST" action="{{ url('journal/action/'.$journal->id) }}">
                        {{ csrf_field() }}
				<div class="panel panel-default">
					<div class="panel-body">
					<div class="row">
							<div class="col-xs-1">
							<i class="glyphicon glyphicon-tags"></i>
							</div>
							<div class="col-xs-11">
							<div class="form-group{{ $errors->has('tindakan') ? ' has-error' : '' }}">
                            <label for="tindakan" class="col-md-1 control-label">Tindakan</label>
                            <div class="col-md-4">
                                <select name="tindakan" id="tindakan" class="form-control selectpicker"
                                    data-live-search="true">
									<option value="">Sila Pilih</option>
									<option value="Ganjaran Prestasi">Ganjaran Prestasi (RP)</option>
									<option value="Merit">Merit</option>
									<option value="Sangat Baik">Sangat Baik</option>
									<option value="Baik">Baik</option>
									<option value="Rutin">Rutin</option>
                                </select>
                                @if ($errors->has('tindakan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tindakan') }}</strong>
                                </span>
                                @endif
                            </div>
							<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Hantar">
							</div>
								<div class="penyelia">
									<small><i><p class="text-danger"><span class="glyphicon glyphicon-exclamation-sign"></span><b> Ruangan ini perlu diisi oleh Pegawai Penyelia 2.</b></p></i></small>
								</div>
							</div>
					</div>
					</div>
					</div>
					</div>
				</form>
				@endif

                <hr/>
                <h4>Jumlah Ulasan: <i>{{$count}}</i></h4>
                @foreach($journal->Comment as $comment)
				<div class="panel panel-warning" style="background-color:#FFFAFA">
					<div class="panel-heading">
						<b>{{ $comment->user->name }}</b><i class="pull-right">{{ \Carbon\Carbon::parse($comment->created_at)->format('d.m.Y H:i:s')}}</i>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-11">
								<p>
									{{ $comment->comment }}	
								</p>
								{{-- delete comment user --}}
								@if(Auth::User()->id == $comment->user->id)
								<form method="POST" action="{{route('articles.comment.destroy', [$journal->id, $comment->id])}}">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></button>
								</form>
								@endif
								{{-- ******* --}}
                            </div>
                        </div>
					</div>
				</div>
                @endforeach
			</div>
			@endif
			{{-- filter user-kontinjen yg nk show --}}
			@elseif(Auth::user()->cawangan == 'Kontinjen')
			@if( Auth::user()->state_id == $journal->User->state_id)
			@if(Auth::user()->Roles->first()->name != 'kck')
				<h4>Ulasan Pegawai Penyelia</h4>					
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-1">
							<i class="glyphicon glyphicon-pencil"></i>
								<!-- <img src="http://placehold.it/48x48" alt=""> -->
							</div>
							<div class="col-xs-11">
								@if( Auth::user()->Roles->first()->name == 'penyelia' || Auth::user()->id == $journal->penyelia && Auth::user()->Roles->first()->name == 'pemproses' )
								<form method="POST" action="{{ route('articles.comment', $journal->id) }}">
										{{ csrf_field() }}
										<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
											<textarea class="form-control comment-box" cols="30" rows="10" name="comment" placeholder="Masukkan ulasan di sini...">{{ old('comment') }}</textarea>
											@if($errors->has('comment'))
				                                <span class="help-block">
				                                    <strong>{{ $errors->first('comment') }}</strong>
				                                </span>
				                            @endif
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-success btn-sm" value="Tambah">
										</div>
									</form>
								@else
								<div class="form-group">
										<textarea disabled class="form-control comment-box" cols="30" rows="10" placeholder="Log masuk penyelia sahaja!"></textarea>
									</div>
									<div class="form-group">
										<input disabled type="submit" class="btn btn-primary btn-sm" value="Tambah">
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				<br>
                <hr>
				@if(in_array('penyelia', $roles))
				<h4>Penilaian Kerja</h4>
				<form class="form-horizontal" role="form" method="POST" action="{{ url('journal/action/'.$journal->id) }}">
                        {{ csrf_field() }}
				<div class="panel panel-default">
					<div class="panel-body">
					<div class="row">
							<div class="col-xs-1">
							<i class="glyphicon glyphicon-tags"></i>
							</div>
							<div class="col-xs-11">
							<div class="form-group{{ $errors->has('tindakan') ? ' has-error' : '' }}">
                            <label for="tindakan" class="col-md-1 control-label">Tindakan</label>
                            <div class="col-md-4">
                                <select name="tindakan" id="tindakan" class="form-control selectpicker"
                                    data-live-search="true">
                                    <option value="">Sila Pilih</option>
									<option value="Ganjaran Prestasi">Ganjaran Prestasi (RP)</option>
									<option value="Merit">Merit</option>
									<option value="Sangat Baik">Sangat Baik</option>
									<option value="Baik">Baik</option>
									<option value="Rutin">Rutin</option>
                                </select>
                                @if ($errors->has('tindakan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tindakan') }}</strong>
                                </span>
                                @endif
                            </div>
							<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Hantar">
							</div>
								<div class="penyelia">
									<small><i><p class="text-danger"><span class="glyphicon glyphicon-exclamation-sign"></span><b> Ruangan ini perlu diisi oleh Pegawai Penyelia 2.</b></p></i></small>
								</div>
							</div>
					</div>
					</div>
					</div>
					</div>
				</form>
				@endif
                <hr/>
                <h4>Jumlah Ulasan: <i>{{$count}}</i></h4>
                @foreach($journal->Comment as $comment)
				<div class="panel panel-warning">
					<div class="panel-heading">
						<b>{{ $comment->user->name }}</b><i class="pull-right">{{ \Carbon\Carbon::parse($comment->created_at)->format('d.m.Y H:i:s')}}</i>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-11">
								<p>
									{{ $comment->comment }}	
								</p>
								{{-- delete comment user --}}
								@if(Auth::User()->id == $comment->user->id)
								<form method="POST" action="{{route('articles.comment.destroy', [$journal->id, $comment->id])}}">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
								</form>
								@endif
								{{-- ******* --}}
                            </div>
                        </div>
					</div>
				</div>
                @endforeach
			</div>
			@endif
			@endif
			@else
			{{-- filter user-daerah yg nk show --}}
			@if(Auth::user()->District->id == $journal->User->district_id)
			@if(Auth::user()->Roles->first()->name != 'kckd')
				<h4>Ulasan Pegawai Penyelia</h4>					
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-1">
							<i class="glyphicon glyphicon-pencil"></i>
								<!-- <img src="http://placehold.it/48x48" alt=""> -->
							</div>
							<div class="col-xs-11">
								@if( Auth::user()->Roles->first()->name == 'penyelia' || Auth::user()->id == $journal->penyelia && Auth::user()->Roles->first()->name == 'pemproses' )
								<form method="POST" action="{{ route('articles.comment', $journal->id) }}">
										{{ csrf_field() }}
										<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
											<textarea class="form-control comment-box" cols="30" rows="10" name="comment" placeholder="Masukkan ulasan di sini...">{{ old('comment') }}</textarea>
											@if($errors->has('comment'))
				                                <span class="help-block">
				                                    <strong>{{ $errors->first('comment') }}</strong>
				                                </span>
				                            @endif
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-success btn-sm" value="Tambah">
										</div>
									</form>
								@else
								<div class="form-group">
										<textarea disabled class="form-control comment-box" cols="30" rows="10" placeholder="Log masuk penyelia sahaja!"></textarea>
									</div>
									<div class="form-group">
										<input disabled type="submit" class="btn btn-primary" value="Tambah">
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				<br>
                <hr>
				@if(in_array('penyelia', $roles))
				<h4>Penilaian Kerja</h4>
				<form class="form-horizontal" role="form" method="POST" action="{{ url('journal/action/'.$journal->id) }}">
                        {{ csrf_field() }}
				<div class="panel panel-default">
					<div class="panel-body">
					<div class="row">
							<div class="col-xs-1">
							<i class="glyphicon glyphicon-tags"></i>
							</div>
							<div class="col-xs-11">
							<div class="form-group{{ $errors->has('tindakan') ? ' has-error' : '' }}">
                            <label for="tindakan" class="col-md-1 control-label">Tindakan</label>
                            <div class="col-md-4">
                                <select name="tindakan" id="tindakan" class="form-control selectpicker"
                                    data-live-search="true">
                                    <option value="">Sila Pilih</option>
									<option value="Ganjaran Prestasi">Ganjaran Prestasi (RP)</option>
									<option value="Merit">Merit</option>
									<option value="Sangat Baik">Sangat Baik</option>
									<option value="Baik">Baik</option>
									<option value="Rutin">Rutin</option>
                                </select>
                                @if ($errors->has('tindakan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tindakan') }}</strong>
                                </span>
                                @endif
                            </div>
							<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Hantar">
							</div>
								<div class="penyelia">
									<small><i><p class="text-danger"><span class="glyphicon glyphicon-exclamation-sign"></span><b> Ruangan ini perlu diisi oleh Pegawai Penyelia 2.</b></p></i></small>
								</div>
							</div>
					</div>
					</div>
					</div>
					</div>
				</form>
				@endif

                <hr/>
                <h4>Jumlah Ulasan: <i>{{$count}}</i></h4>
                @foreach($journal->Comment as $comment)
				<div class="panel panel-warning">
					<div class="panel-heading">
						<b>{{ $comment->user->name }}</b><i class="pull-right">{{ \Carbon\Carbon::parse($comment->created_at)->format('d.m.Y  H:i:s')}}</i>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-11">
								<p>
									{{ $comment->comment }}	
								</p>
								{{-- delete comment user --}}
								@if(Auth::User()->id == $comment->user->id)
								<form method="POST" action="{{route('articles.comment.destroy', [$journal->id, $comment->id])}}">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></button>
								</form>
								@endif
								{{-- ******* --}}
                            </div>
                        </div>
					</div>
				</div>
                @endforeach
			</div>
			@endif
			@endif
			@endif
		</div>
<style>
table {
  table-layout: fixed ;
  width: 100% ;
}
.th {
    width: 25% ;
}
.comment-box {
	max-height: 100px;
}
.penyelia{
	padding-left:28px;
}
/* h4 {
  color: white;
  text-shadow: 1px 1px 3px #000000;
} */
</style>                        
@endsection

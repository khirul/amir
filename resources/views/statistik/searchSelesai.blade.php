@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Carian Tindakan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/laporan_statistik/carianSelesai') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('tarikh_dari') ? ' has-error' : '' }}">
                            <label for="tarikh_dari" class="col-md-4 control-label">Tarikh Dari</label>

                            <div class="col-md-6">
                                <input id="tarikh_dari" type="date" class="form-control" name="tarikh_dari" >

                                @if ($errors->has('tarikh_dari'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tarikh_dari') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('tarikh_hingga') ? ' has-error' : '' }}">
                            <label for="tarikh_hingga" class="col-md-4 control-label">Tarikh Hingga</label>

                            <div class="col-md-6">
                                <input id="tarikh_hingga" type="date" class="form-control" name="tarikh_hingga" >

                                @if ($errors->has('tarikh_hingga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tarikh_hingga') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                   <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                   Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
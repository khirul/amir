@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                {{-- <div class="panel-heading">Statistik</div> --}}

                <div class="panel-body">
                        {{-- <span class="text-right"><span class="label label-info">Bukit Aman</span></span> --}}
                        <h3>Statistik Keseluruhan</h3>
                        <hr/>
                    {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection
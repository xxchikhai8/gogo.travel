@extends('layouts.enterprise')
@section('content')
@section('title', 'Ticket List')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">revernue</div>
                <div class="card-body">
                    {!! $chart->container() !!}
                    {!! $chart->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

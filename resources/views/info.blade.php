@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">MY INFO</div>

                <div class="panel-body">
                    <h1 align="center">{{$cv->name}}</h1>
                    <div><big>INFO:</big>&nbsp;&nbsp; {{$cv->info}}</div><br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">CV</div>

                <div class="panel-body">
                    <div><img id="imgtitul" src="titul/Stas.jpg"></div>
                    <div id="cv">
                            <h1 align="center">{{$cv->name}}</h1>
                            <div><big>INFO:<br/></big>&nbsp; {{$cv->info}}</div><br/>
                            <div><big>Target:<br/></big>&nbsp; {{$cv->target}}</div><br/>
                            <div><big>Programming Skills:<br/></big>&nbsp; {{$cv->skills}}</div><br/>
                            <div><big>Previous Positions:<br/></big>&nbsp; {{$cv->previousS}}</div><br/>
                            <div><big>Education:<br/></big>&nbsp; {{$cv->education}}</div><br/>
                            <div><big>Language Skills:<br/></big>&nbsp; {{$cv->language}}</div><br/>
                            <div><big>Personal Traits:<br/></big>&nbsp; {{$cv->traits}}</div><br/>
                            <div><big>Hobbies and Interests:<br/></big>&nbsp; {{$cv->interests}}</div><br/>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


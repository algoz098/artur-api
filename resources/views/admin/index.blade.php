@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Gas Tracks per Period</div>

                <div class="card-body">
                    <ul>
                        <li>7 days - {{$gasTrack7Days}}</li>
                        <li>15 days - {{$gasTrack15Days}}</li>
                        <li>30 days - {{$gasTrack30Days}}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Users per Period</div>

                <div class="card-body">
                    <ul>
                        <li>7 days - {{$user7Days}}</li>
                        <li>15 days - {{$user15Days}}</li>
                        <li>30 days - {{$user30Days}}</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mt-md-4">
            <div class="card">
                <div class="card-header">Last votes</div>

                <div class="card-body">
                    <ul>
                        @foreach ($lastVotes as $vote)
                        <li>
                            <b>Star:</b> {{ $vote->stars }} 
                            <b>Origin:</b> {{$vote->origin}} 
                            <b>Creation:</b> {{$vote->created_at->format('h:i d/m/Y')}}
                            <br> 
                            <b>Comment:</b> {{$vote->comment}} 
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-md-4">
            <div class="card">
                <div class="card-header">Last votes</div>

                <div class="card-body">
                    <ul>
                        @foreach ($lastVotes as $vote)
                        <li>
                            <b>Star:</b> {{ $vote->stars }} 
                            <b>Origin:</b> {{$vote->origin}} 
                            <b>Creation:</b> {{$vote->created_at->format('h:i d/m/Y')}}
                            <br> 
                            <b>Comment:</b> {{$vote->comment}} 
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

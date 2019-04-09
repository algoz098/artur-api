@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to WebGS APIs') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        {{ __('Here we provide information for some APPs and structures like:') }}

                        <ul>
                            <li>
                                <a href="{{route('GasTrackAbout')}}">
                                    {{ __('Gas Track Quasar') }}
                                </a>
                            </li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to About Gas Track') }}</div>

                <div class="card-body">
                    <p>
                        {{ __('A App to track you spend and km/lt for you Car') }}

                    </p>
                    
                    <a class="btn btn-primary" href="https://play.google.com/store/apps/details?id=br.com.webgs.gastrackquasar">See in Google Play</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

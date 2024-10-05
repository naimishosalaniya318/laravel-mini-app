@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Weather in New York</h1>
                        @if ($weather)
                            <p>Temperature: {{ $weather['main']['temp'] }} °C</p>
                            <p>Weather: {{ $weather['weather'][0]['description'] }}</p>
                        @else
                            <p>Weather information is not available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

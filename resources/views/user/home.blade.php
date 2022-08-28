@extends('user.layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-7 col-md-10 col-sm-11 col-12">
                <div class="card shadow ">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body py-3">
                        {{ __('Welcome ' . Auth::user()->name . '!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

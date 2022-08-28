@extends('admin.layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-7 col-md-10 col-sm-11 col-12">
                <div class="card shadow ">
                    <div class="card-body py-3">
                        {{-- {{ __('Welcome') }} --}}
                        {{ __('Welcome ' . Auth::user()->name . '!') }}
                        <a href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

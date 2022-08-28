@extends('admin.layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow" style="border-radius: 20px">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-11 col-12">
                                <div class="row border-bottom border-2 border-primary">
                                    <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                                        <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Students Table') }}
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                                        <form action="{{ route('admin.search.student') }}" method="GET" role="search"
                                            class="d-flex">
                                            @csrf
                                            <input class="form-control me-2 border border-primary" type="search"
                                                name="search" placeholder="Search Name or Email" aria-label="Search">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                        </form>
                                    </div>
                                </div>
                                @if (count($user) > 0)
                                    <div class="table-responsive py-3">
                                        <table class="table">
                                            <tbody>
                                                @if (session('msg'))
                                                    <div class="col-lg-12 py-3">
                                                        <div class="text-center justify-content-center">
                                                            <i
                                                                class="bi bi-exclamation-triangle-fill fs-1 text-warning text-center"></i>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="h2 fw-bold text-danger text-center">
                                                                {{ __('ERROR 404 | Not Found!') }}</p>
                                                            <h5 class="card-title fw-bold text-center">{{ session('msg') }}
                                                            </h5>
                                                            <p class="card-text fw-bold text-center text-muted">
                                                                {{ __('Sorry, but the query you were looking for was either not found or does not exist.') }}
                                                            </p>
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-5 col-md-5 col-sm-10 col-12">
                                                                    <div class="row">
                                                                        <form action="{{ route('admin.search.student') }}"
                                                                            method="GET" role="search" class="d-flex">
                                                                            @csrf
                                                                            <div class="input-group">
                                                                                <input
                                                                                    class="form-control me-2 border border-primary"
                                                                                    type="search" name="search"
                                                                                    placeholder="Please try again to search by Name or Email"
                                                                                    aria-label="Search">
                                                                                <div class="input-group-text bg-primary">
                                                                                    <button class="btn " type="submit"><i
                                                                                            class="fa-solid fa-magnifying-glass text-white"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    @if (Session::has('message'))
                                                        <div class="alert alert-success" role="alert">
                                                            <i class="fa-solid fa-check"></i>
                                                            <span class="px-2">{{ Session::get('message') }}</span>
                                                        </div>
                                                    @endif
                                                    <table class="table table-bordered">
                                                        <thead class="table-primary">
                                                            <tr class="text-center">
                                                                <th scope="col">{{ __('School ID Number') }}</th>
                                                                <th scope="col">{{ __(' ') }}</th>
                                                                <th scope="col">{{ __('Students Name') }}</th>
                                                                <th scope="col">{{ __('Email') }}</th>
                                                                <th scope="col">{{ __('Status') }}</th>
                                                                <th scope="col">{{ __('Actions') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($user as $users)
                                                                <tr>
                                                                    <td class="text-center" scope="row">
                                                                        {{ $users->id_number }}</td>
                                                                    {{-- <th  class="text-center fs-5 py-3 d-none d-sm-block">{{ $users->id }}</th> --}}
                                                                    <td class="text-center col-lg-1 col-md-1 col-sm-1 col-1"
                                                                        scope="row">
                                                                        @if ($users->image)
                                                                            <img src="{{ asset('/storage/images/' . $user->image) }}"
                                                                                class="img-fluid" alt="">
                                                                        @else
                                                                            <img src="{{ asset('/storage/images/avatar.png') }}"
                                                                                alt="hugenerd" width="35" height="35"
                                                                                class="rounded-circle">
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center fw-bold h6 py-3 text-truncate"
                                                                        scope="row">{{ $users->name }}</td>
                                                                    <td class="text-center" scope="row">
                                                                        {{ $users->email }}</td>
                                                                    <td class="text-center" scope="row">
                                                                        @if (Cache::has('is_online' . $users->id))
                                                                            <span class="text-success fw-bold">•
                                                                                Online</span>
                                                                        @else
                                                                            <span class="text-secondary fw-bold">•
                                                                                Offline</span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center" scope="row">
                                                                        <button type="button"
                                                                            class=" btn btn-success bi bi-eye-fill"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModalCenter{{ $users->id }}"></button>
                                                                        <button type="button"
                                                                            class=" btn btn-warning bi bi-cart3"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModalCenters{{ $users->id }}"></button>
                                                                        <a href="{{ route('admin.student.destroy', $users->id) }}"
                                                                            class="btn btn-danger"
                                                                            onclick="return confirm('Are you sure to remove this user?')"><i
                                                                                class="bi bi-trash"></i></a>
                                                                        {{-- <div class="dropdown">
                                                                            <a class="btn btn-outline-primary border-0 fs-5 rounded-circle"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false"><i
                                                                                    class="bi bi-three-dots-vertical"></i></a>
                                                                            <ul class="dropdown-menu dropdown-menu-dark"
                                                                                aria-labelledby="navbarDarkDropdownMenuLink">
                                                                                <li><a class="dropdown-item" href="#"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#exampleModalCenter{{ $users->id }}"><i
                                                                                            class="fa-solid fa-eye fs-5 px-2"></i>{{ __('View') }}</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item" href="#"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#exampleModalCenters{{ $users->id }}"><i
                                                                                            class="fa-solid fa-cart-shopping fs-5 px-2"></i>{{ __('Add Payment') }}</a>
                                                                                </li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="{{ route('admin.student.destroy', $users->id) }}"
                                                                                        onclick="return confirm('Are you sure to remove this student?')"><i
                                                                                            class="fa-solid fs-5 fa-trash-can px-2"></i>{{ __('Remove') }}</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div> --}}
                                                                        {{-- View Profile Modal --}}
                                                                        <div class="modal fade modal-alert"
                                                                            id="exampleModalCenter{{ $users->id }}"
                                                                            tabindex="-1"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog ">
                                                                                <div class="modal-content shadow"
                                                                                    style="border-radius:20px; ">
                                                                                    <div
                                                                                        class="modal-header flex-nowrap border-bottom-0">
                                                                                        <button type="button"
                                                                                            class="btn-close"data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="modal-body p-4 text-center">
                                                                                        <div
                                                                                            class="thumb-lg member-thumb ms-auto">
                                                                                            <img src="{{ asset('/storage/images/avatar.png') }}"
                                                                                                class="border border-info border-5 rounded-circle img-thumbnail"
                                                                                                alt=""
                                                                                                height="150px"
                                                                                                width="150px">
                                                                                        </div>
                                                                                        <h2 class="fw-bold mb-0">
                                                                                            {{ $users->name }}</h2>
                                                                                        <h5 class="my-2 mb-0 ">
                                                                                            {{ __('ID Number: ') }}{{ $users->id_number }}
                                                                                        </h5>
                                                                                        <p class="">
                                                                                            {{ __('@Email ') }}<span>|
                                                                                            </span><span><a href="#"
                                                                                                    class=" text-decoration-none">{{ $users->email }}</a></span>
                                                                                        </p>
                                                                                        {{-- <a href="{{ route('admin.student.profile',$users->email) }}" class="btn btn-primary col-3 fw-bolder" style="border-radius:20px;">{{ __('View more') }}</a> --}}
                                                                                        <button type="button"
                                                                                            class="btn btn-danger col-3"
                                                                                            data-bs-dismiss="modal"
                                                                                            style="border-radius:20px;">{{ __('Close') }}</button>
                                                                                    </div>
                                                                                    {{-- <div class="modal-footer flex-nowrap p-0">
                                                            <a href="#" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 fw-bolder border-right">{{ __('View more') }}</a>
                                                            <button type="button" class="btn btn-lg btn-link fs-6 text-danger fw-bold text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                        </div> --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{-- Update Profile Modal --}}
                                                                        <div class="modal fade modal-alert"
                                                                            id="exampleModalCenters{{ $users->id }}"
                                                                            tabindex="-1"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog ">
                                                                                <div class="modal-content shadow"
                                                                                    style="border-radius:20px; ">
                                                                                    <div
                                                                                        class="modal-header flex-nowrap border-bottom-0">
                                                                                        <button type="button"
                                                                                            class="btn-close"data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body text-center">
                                                                                        <div
                                                                                            class="thumb-lg member-thumb ms-auto">
                                                                                            <img src="{{ asset('/storage/images/avatar.png') }}"
                                                                                                class="border border-info border-5 rounded-circle img-thumbnail"
                                                                                                alt=""
                                                                                                height="100px"
                                                                                                width="100px">
                                                                                        </div>
                                                                                        <h2 class="fw-bold mb-0">
                                                                                            {{ $users->name }}</h2>
                                                                                        <h5 class="my-2 mb-0 ">
                                                                                            {{ __('ID Number: ') }}{{ $users->id_number }}
                                                                                        </h5>
                                                                                        <p class="">
                                                                                            {{ __('@Email ') }}<span>|
                                                                                            </span><span><a href="#"
                                                                                                    class=" text-decoration-none">{{ $users->email }}</a></span>
                                                                                        </p>
                                                                                        <form
                                                                                            action="{{ url('admin/store/' . $users->id) }}"
                                                                                            method="POST">
                                                                                            @csrf
                                                                                            <div
                                                                                                class="form-group mb-4 text-start">
                                                                                                <input type="hidden"
                                                                                                    name="user_id"
                                                                                                    class="d-none"
                                                                                                    value="{{ $users->id }}">
                                                                                                <label for="recipient-name"
                                                                                                    class="col-form-label ">{{ __('Enter Amount: ') }}</label>
                                                                                                <input type="text"
                                                                                                    class="form-control @error('fee') is-invalid @enderror"
                                                                                                    id="fee"
                                                                                                    name="fee">
                                                                                                @error('fee')
                                                                                                    <span
                                                                                                        class="invalid-feedback"
                                                                                                        role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
                                                                                            </div>
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary col-lg-2 col-5 fw-bolder"
                                                                                                style="border-radius:20px;">{{ __('Add') }}</button>
                                                                                            <button type="button"
                                                                                                class="btn btn-danger col-lg-2 col-5"
                                                                                                data-bs-dismiss="modal"
                                                                                                style="border-radius:20px;">{{ __('Close') }}</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        {{ $user->links() }}
                                    </div>
                                @else
                                    <div class="col-lg-12 mb-3 ">
                                        <div class="mb-3 py-4">
                                            <div class="text-center display-1">
                                                <i class="fa-solid fa-users-slash display-1"></i>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title fs-3 text-center">
                                                    {{ __('No Students Enrolled yet.') }}</h5>
                                                <div class="text-center">
                                                    <a href="#" class="fs-5 text-decoration-none btn btn-primary"><i
                                                            class="fa-solid fa-user-plus px-2"></i>{{ __('Add Students') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

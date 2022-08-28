@extends('user.layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="text-center ">
                                    <img src="{{ asset('/storage/images/avatar.png') }}" class="mb-3" height="150"
                                        width="150">
                                    <h4 class="text-primary">{{ Auth::user()->id_number }}</h4>
                                    <h3 class="fw-bold text-decoration-underline">{{ Auth::user()->name }}</h3>
                                    <h6 class="text-center text-muted mb-4">
                                        {{ __('Email: ' . Auth::user()->email) }}
                                    </h6>
                                    <h6 class="text-muted fw-bold text-uppercase small">{{ __('Student\'s Profile') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="row mb-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h4 class="mb-2  fw-bold">{{ __('Transaction History') }}</h4>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-primary">
                                        <tr class="text-center">
                                            <th scope="col">{{ __('Transaction Number') }}</th>
                                            <th scope="col">{{ __('School ID Number') }}</th>
                                            <th scope="col">{{ __('Students Name') }}</th>
                                            <th scope="col">{{ __('Description') }}</th>
                                            <th scope="col">{{ __('Amount') }}</th>
                                            <th scope="col">{{ __('Transaction Date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $payment)
                                            <tr class="text-center">
                                                <th scope="row">{{ $payment->id }}</th>
                                                <td>{{ $payment->users->id_number }}</td>
                                                <td>{{ $payment->users->name }}</td>
                                                <td>{{ $payment->description }}</td>
                                                <td>{{ __('₱ ' . $payment->fee) }}</td>
                                                <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($payment->created_at))->isoFormat('MMMM D YYYY') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $payments->links() }}
                            {{-- <form action="">
                                <fieldset disabled="disabled">
                                    <div class="row mb-3">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            @if (Session::has('msg'))
                                                <div class="alert alert-success" role="alert">
                                                    <i class="fa-solid fa-check"></i>
                                                    <span class="px-2">{{ Session::get('msg') }}</span>
                                                </div>
                                            @endif
                                            <h4 class="mb-2  fw-bold">{{ __('Personal Information') }}</h4>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 ">
                                            <div class="form-group">
                                                <label for="fullName" class="col-form-label">Full Name</label>
                                                <input type="text" class="form-control is-valid" id="fullName"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="eMail" class="col-form-label">Email</label>
                                                <input type="email" class="form-control is-valid" id="eMail"
                                                    value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="eMail" class="col-form-label">{{ __('Address') }}</label>
                                                <input type="text" class="form-control is-valid" id="eMail"
                                                    value="{{ Auth::user()->address }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="eMail"
                                                    class="col-form-label">{{ __('Phone Number') }}</label>
                                                <input type="number" class="form-control is-valid" id="eMail"
                                                    value="{{ Auth::user()->phone_number }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="eMail" class="col-form-label">{{ __('Department') }}</label>
                                                <input type="text" class="form-control is-valid" id="eMail"
                                                    value="{{ Auth::user()->department }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="eMail" class="col-form-label">{{ __('ID Number') }}</label>
                                                <input type="text" class="form-control is-valid" id="eMail"
                                                    value="{{ Auth::user()->id_number }}">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">{{ __('Edit Profile') }}</button>
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form action="{{ route('profile.update', Auth::user()->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="row mb-3">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <h4 class="mb-2  fw-bold">
                                                                    {{ __('Update Personal Information') }}</h4>
                                                            </div>
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12 ">
                                                                <div class="form-group">
                                                                    <label for="name" class="col-form-label">Full
                                                                        Name</label>
                                                                    <input type="text"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        name="name" id="name"
                                                                        value="{{ Auth::user()->name }}">
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="eMail"
                                                                        class="col-form-label">Email</label>
                                                                    <input type="email" name="email"
                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                        id="eMail" value="{{ Auth::user()->email }}">
                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="address"
                                                                        class="col-form-label">{{ __('Address') }}</label>
                                                                    <input type="text" name="address"
                                                                        class="form-control @error('address') is-invalid @enderror"
                                                                        id="address"
                                                                        value="{{ Auth::user()->address }}">
                                                                    @error('address')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="phone_number"
                                                                        class="col-form-label">{{ __('Phone Number') }}</label>
                                                                    <input type="number" name="phone_number"
                                                                        class="form-control @error('phone_number') is-invalid @enderror"
                                                                        id="phone_number"
                                                                        value="{{ Auth::user()->phone_number }}">
                                                                    @error('phone_number')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="id_number"
                                                                        class="col-form-label">{{ __('ID Number') }}</label>
                                                                    <input type="text" name="id_number"
                                                                        class="form-control @error('id_number') is-invalid @enderror"
                                                                        id="id_number"
                                                                        value="{{ Auth::user()->id_number }}">
                                                                    @error('id_number')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary">{{ __('Update') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

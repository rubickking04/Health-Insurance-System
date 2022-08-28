@extends('user.layouts.auth')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="card shadow">
                    <div class="card-body py-2">
                        <div class="text-center">
                            <img src="{{ asset('/storage/images/logo.jpg') }}" alt="avatar"
                                class="rounded-circle img-thumbnail  mb-3" height="100px" width="100px">
                            <h2>{{ __('Health Insurance System') }}</h2>
                            <h4>{{ __('Student Registration Form') }}</h4>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-2">
                                <div class="form-outline text-start col-lg-6">
                                    <label for="name" class="col-form-label">Name</label>
                                    <div class="input-group">
                                        {{-- <div class="input-group-text"><i class="fa-solid fa-user"></i></div> --}}
                                        <input type="text" id="name" placeholder="Example: Al-Fhaigar Usman"
                                            name="name" class="form-control @error('name') is-invalid @enderror" />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start col-lg-6">
                                    <label for="id_number" class="col-form-label">{{ __('ID Number') }}</label>
                                    <div class="input-group">
                                        {{-- <div class="input-group-text"><i class="fa-solid fa-user"></i></div> --}}
                                        <input type="text" id="id_number" placeholder="Example: ITE 19-00137"
                                            name="id_number"
                                            class="form-control @error('id_number') is-invalid @enderror" />
                                        @error('id_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start col-lg-4">
                                    <label for="address" class="col-form-label">{{ __('Address') }}</label>
                                    <div class="input-group">
                                        {{-- <div class="input-group-text"><i class="fa-solid fa-user"></i></div> --}}
                                        <input type="text" id="address" placeholder="Example: Sinunuc Z.C."
                                            name="address" class="form-control @error('address') is-invalid @enderror" />
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start col-lg-4">
                                    <label for="phone_number" class="col-form-label">{{ __('Phone Number') }}</label>
                                    <div class="input-group">
                                        <input type="number" id="phone_number" placeholder="Example: 09557815639"
                                            name="phone_number"
                                            class="form-control @error('phone_number') is-invalid @enderror" />
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start col-lg-4">
                                    <label for="department" class="col-form-label">{{ __('Department ') }}</label>
                                    <select name="department" id="department"
                                        class="form-control form-select my-select  @error('department') is-invalid @enderror">
                                        <option disabled selected>Choose...</option>
                                        <option value="College of Engineering & Technology">
                                            {{ __('College of Engineering & Technology') }}</option>
                                        <option value="College of Arts, Humanities & Social Sciences">
                                            {{ __('College of Arts, Humanities & Social Sciences') }}</option>
                                        <option value="College of Teacher Education">
                                            {{ __('College of Teacher Education') }}</option>
                                        <option value="College of Maritime Education">
                                            {{ __('College of Maritime Education') }}</option>
                                        <option value="College of Technical Education">
                                            {{ __('College of Technical Education') }}</option>
                                        <option value="College of Information and Computing Sciences">
                                            {{ __('College of Information and Computing Sciences') }}</option>
                                        <option value="Senior High School">{{ __('Senior High School') }}</option>
                                        <option value="Graduate School">{{ __('Graduate School') }}</option>
                                    </select>
                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline text-start">
                                    <label for="email" class="col-form-label">Email</label>
                                    <div class="input-group">
                                        {{-- <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div> --}}
                                        <input type="email" id="email" placeholder="Example: rubickking04@gmail.com"
                                            name="email" class="form-control @error('email') is-invalid @enderror" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start col-lg-6 mb-2">
                                    <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text" onclick="password_show_hide();">
                                            <i class="fas fa-eye" id="show_eye"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                        <input id="password" type="password" placeholder="Must be 8-20 characters long."
                                            class="form-control @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start col-lg-6">
                                    <label for="password-confirm"
                                        class="col-form-label">{{ __('Confirm Password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text" onclick="password_show_hides();">
                                            <i class="fas fa-eye" id="show_eyes"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eyes"></i>
                                        </span>
                                        <input id="password-confirm" type="password" placeholder="Confirm your password"
                                            class="form-control @error('password-confirm') is-invalid @enderror"
                                            name="password_confirmation" autocomplete="new-password">
                                    </div>
                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class=" text-center btn btn-primary mb-2">{{ __('Sign up') }}</button>
                            </div>
                            <div class="text-center">
                                <p>Already have an account? <a href="{{ route('login') }}">{{ __('Sign in') }}</a></p>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

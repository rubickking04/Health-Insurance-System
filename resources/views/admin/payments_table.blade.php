@extends('admin.layouts.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card shadow ">
                    <div class="card-body py-3">
                        <div class="row justify-content-center">
                            <div class="col-lg-11 col-12">
                                <div class="row border-bottom border-2 border-primary">
                                    <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                                        <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Transactions Table') }}
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                                        <form action="{{ route('admin.payments.search') }}" method="GET" role="search"
                                            class="d-flex">
                                            @csrf
                                            <input class="form-control me-2 border border-primary" type="search"
                                                name="search" placeholder="Search Name or Email" aria-label="Search">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive py-3">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

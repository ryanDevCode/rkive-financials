@php
    $user = auth()
        ->user()
        ->only(['first_name', 'last_name', 'role_code', 'profile']);
    $user['profile'] = asset('storage/' . $user['profile']);
    $user['name'] = $user['first_name'] . ' ' . $user['last_name'];
    $user['role'] = strtolower($user['role_code']);
    // dd($user);
    if ($user['role'] == '102') {
        $role = 'admin';
    } else {
        $role = 'user';
    }
@endphp

@extends('layouts.custom.' . $role . '.master')

@section('title', "'" . $role . "Dashboard'")

@section('profile-nav')
    <div class="media profile-media"><img src="{{ $user['profile'] }}" style="width: 30px; height: 30px;" alt="User Photo" class="rounded-circle">
        <div class="media-body"><span>{{ $user['name'] }}</span>
            <p class="mb-0 font-roboto">{{ strtoupper($role) }} <i class="middle fa fa-angle-down"></i></p>
        </div>
    </div>
@endsection

@section('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
      <!-- Datepicker CSS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>{{ $role }} Dashboard</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ ucfirst($role) }}</li>
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Details</li>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card o-hidden welcome-card"
                    style="background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
                    <div class="card-body">
                        <h4 class="mb-3 mt-1 f-w-500 mb-0 f-22"><span> <img
                                    src="https://fbs.rkiveadmin.com/travel-portal/assets/images/dashboard/hand.svg"
                                    alt="hand vector"></span></h4>


                        <h4 class="f-w-400">Total Budget: ₱ {{ number_format($budget[0]->budget_approvedAmount, 2) }} </h4>
                        <h5 class="f-w-400">Remaining Balance:
                            ₱{{ number_format($budget[0]->budget_approvedAmount - $expenseSum, 2) }} </h5>
                    </div><img class="welcome-img"
                        src="https://fbs.rkiveadmin.com/travel-portal/assets/images/dashboard/widget.svg"
                        alt="search image">
                </div>
            </div>

            <div class="default-according pb-5" id="accordion">
                <div class="card">
                    <div class="card-header ">
                        <h5 class="mb-0 ">
                            <button class="btn btn-link txt-danger" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne" data-bs-original-title=""
                                title="">Input your expenses here</button>
                        </h5>
                    </div>
                    <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="card-body">

                            <x-alert />
                            <form method="POST" action="{{ route('admin.saveBudgetExpense', ['id' => $budget[0]->id]) }}">
                                @csrf
                                <h5>Track Your Expenses</h5>
                                <div class="row gy-3">
                                    <input hidden="" name="track_id" value="{{ $budget[0]->id }}">
                                    <input hidden="" name="track_department" value="{{ $budget[0]->budget_department }}">
                                    <div class="col-md-4">
                                        <x-select name="track_category" label="Category" :options="$categories"
                                            valueId="category_code" valueName="category_name" />
                                    </div>

                                    <div class="col-md-4">
                                        <x-input-number name="track_amount" label="Amount" />
                                    </div>

                                    <div class="col-md-4">
                                        <x-date name="track_date" label="Date" />
                                    </div>

                                    <div class="col-12 mt-4">
                                        <x-button name="Add Expense" type="submit" class="btn btn-primary" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="">
                    <div class="row card-header p-4 card-no-border">
                        <div class="col-lg-6 col-sm-12 right">
                            <h5 class="f-w-400">{{ $budget[0]->budget_name }}</h5>
                            <p><span class="txt-success">Track Code: </span> {{ $budget[0]->id }} </p>
                            <p>Duration: {{ $budget[0]->budget_startDate }} - {{ $budget[0]->budget_endDate }} </p>
                            <p>Purpose: {{ $budget[0]->budget_description }}</p>
                        </div>
                        <div class="col-lg-6 left  col-sm-12 border border-top-0 border-end-0 border-bottom-0 ">
                            <p>Amount:</p>
                            <h5>₱{{ number_format($budget[0]->budget_approvedAmount, 2) }}</h5>
                            <p>Submitted On: {{ $budget[0]->created_at }}</p>
                            <div class="float-right">
                                <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter" data-bs-original-title="" title="">Submit
                                    Expense
                                    Report</button>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Expense Summary</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close" data-bs-original-title="" title=""></button>
                                            </div>
                                            <p class="txt-danger text-center pt-2">Review before submiting</p>
                                            <div class="table">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="border-bottom-primary text-center">
                                                            <th scope="col">Expense Category</th>
                                                            <th scope="col">Total Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($expenses->isEmpty())
                                                            <tr>
                                                                <td colspan="2" class="text-center">No expenses added
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @foreach ($expenses as $item)
                                                            <tr class="text-center">
                                                                @foreach ($categories as $category)
                                                                    @if ($category->category_code == $item->track_category)
                                                                        <td>{{ $category->category_name }}</td>
                                                                    @endif
                                                                @endforeach
                                                                <td>₱{{ $item->track_amount }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-container">
                                <table class="table">
                                    <thead class="text-center">
                                        <tr>
                                            {{-- <th class="sortable">Track ID</th> --}}
                                            <th class="sortable">Name</th>
                                            <th class="sortable">Amount</th>
                                            <th class="sortable">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($expenses as $bdgt)
                                            <tr class="text-center">
                                                {{-- <td>{{ $bdgt->id }}</td> --}}
                                                <td>
                                                    @foreach ($categories as $category)
                                                        @if ($category->category_code == $bdgt->track_category)
                                                            {{ $category->category_name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $bdgt->track_amount }}</td>
                                                <td>{{ $bdgt->track_date }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
    <!-- Datepicker JS -->
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
@endsection

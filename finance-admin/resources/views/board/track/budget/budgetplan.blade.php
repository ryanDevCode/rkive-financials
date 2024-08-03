@php
    $user = [
        'name' => session()->get('name'),
        'role' => session()->get('role'),
    ];

    $role = strtolower($user['role']);
@endphp

@extends('layouts.custom.' . $role . '.master')

@section('title', "'" . $role . "Dashboard'")

@section('profile-nav')
    <div class="media profile-media"><img class="b-r-10" src="{{ asset('assets/images/dashboard/profile.png') }}"
            alt="">
        <div class="media-body"><span>{{ $user['name'] }}</span>
            <p class="mb-0 font-roboto">{{ strtoupper($user['role']) }} <i class="middle fa fa-angle-down"></i></p>
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
    <h3>Annual Budget Plan</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ $user['role'] }}</li>
    <li class="breadcrumb-item active">Budget Plan</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="d-flex justify-content-center mb-3">
                <div class="card col-sm-12 col-lg-5  p-3 m-2 text-white"
                    style="background-color: #4158D0;
        background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
        ">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-shopping-bag">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                    </div>
                    <h5>Spent</h5>
                    <h1>₱{{ number_format($spend, 2) }}</h1>
                </div>
                <div class="card col-sm-12 col-lg-5 p-3 m-2 text-white"
                    style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-dollar-sign">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <h5>Total Balance</h5>
                    <h1>₱{{ number_format($budgetSum, 2) }}</h1>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="">
                    <div class="card-header p-3">
                        <h3 class="f-w-400">List of Requests</h3>
                    </div>
                    <div class="table-responsive signal-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Track no</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($budgets as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->budget_description }}</td>
                                        <td>₱{{ number_format((float) $item->budget_amount, 2) }}</td>
                                        <td><a href="{{ route('admin.budgetPlanExpenses', ['id' => $item->id]) }}"
                                                class="btn btn-outline-primary btn-square" data-bs-original-title=""
                                                title="">Track Expenses</a></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->status->status_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

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

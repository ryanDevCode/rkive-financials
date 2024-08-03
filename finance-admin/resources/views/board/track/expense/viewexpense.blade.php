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
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>{{ $role }} Dashboard</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ ucfirst($role) }}</li>
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Annual Budget</li>
    <li class="breadcrumb-item active">Expense</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="row m-2 justify-content-center">
                <div class="col-sm-4">
                    <div class="card small-widget mb-sm-0 app">
                        <div class="card-body primary"> <span class="f-light">Total Budget</span>
                            <div class="d-flex align-items-end gap-1"><span class="font-primary f-12 f-w-500">
                                    <h4>
                                        ₱ {{ number_format($budget->sum('budget_approvedAmount'), 2) }}
                                    </h4>
                                </span></div>
                            <div class="bg-gradient">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-slack font-primary"
                                    style="font-size: 30px">
                                    <path
                                        d="M22.08 9C19.81 1.41 16.54-.35 9 1.92S-.35 7.46 1.92 15 7.46 24.35 15 22.08 24.35 16.54 22.08 9z">
                                    </path>
                                    <line x1="12.57" y1="5.99" x2="16.15" y2="16.39"></line>
                                    <line x1="7.85" y1="7.61" x2="11.43" y2="18.01"></line>
                                    <line x1="16.39" y1="7.85" x2="5.99" y2="11.43"></line>
                                    <line x1="18.01" y1="12.57" x2="7.61" y2="16.15"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card small-widget mb-sm-0 app">
                        <div class="card-body primary"> <span class="f-light">Remaining Budget</span>
                            <div class="d-flex align-items-end gap-1"><span class="font-primary f-12 f-w-500">
                                    <h4>
                                        ₱{{ number_format($budget->sum('budget_approvedAmount') - $trackSum, 2) }}
                                    </h4>
                                </span></div>
                            <div class="bg-gradient">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-slack font-primary"
                                    style="font-size: 30px">
                                    <path
                                        d="M22.08 9C19.81 1.41 16.54-.35 9 1.92S-.35 7.46 1.92 15 7.46 24.35 15 22.08 24.35 16.54 22.08 9z">
                                    </path>
                                    <line x1="12.57" y1="5.99" x2="16.15" y2="16.39"></line>
                                    <line x1="7.85" y1="7.61" x2="11.43" y2="18.01"></line>
                                    <line x1="16.39" y1="7.85" x2="5.99" y2="11.43"></line>
                                    <line x1="18.01" y1="12.57" x2="7.61" y2="16.15"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card p-3">
                    <div class="card-header">
                        <h5>{{ $department . ' Departments' }}</h5>
                    </div>
                    <div class="table-responsive mb-2">
                        <table class="table">
                            <thead>
                                <tr class="">
                                    <th scope="col">Quarter</th>
                                    <th scope="col">Categories</th>
                                    {{-- <th scope="col">Planned</th> --}}
                                    <th scope="col">Cost</th>
                                    {{-- <th scope="col">Remaining</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($quarters as $catCode => $catAmount)
                                    @foreach ($catAmount as $quarter)
                                        <tr>
                                            <th scope="col" style="border: none;">{{ 'Q' . $quarter['quarter'] }}</th>
                                        </tr>
                                        <tr>
                                            <td style="border: none"></td>
                                            @foreach ($categories as $items)
                                                @if ($items->category_code == $catCode)
                                                    <td>{{ $items->category_name }}</td>
                                                @endif
                                            @endforeach --}}

                                @foreach ($matchedTrack as $trackCode => $trackAmount)
                                    @foreach ($trackQuarter as $item)
                                        @php
                                            $quarterData = json_decode($item, true);
                                            $quarterNumber = $quarterData['quarter'];
                                        @endphp
                                        <tr>
                                            <th scope="col" style="border: none;">{{ 'Q' . $quarterNumber }}</th>
                                        </tr>
                                    @endforeach

                                    <td style="border: none"></td>
                                    <tr>
                                        <td></td>
                                        @foreach ($categories as $items)
                                            @if ($items->category_code == $trackCode)
                                                <td>{{ $items->category_name }}</td>
                                            @endif
                                        @endforeach
                                        {{-- <dd>{{$catCode}}</dd> --}}
                                        {{-- <dd>{{ $trackCode }}</dd> --}}
                                        {{-- @if ($trackCode == $catCode)  --}}

                                        <td>₱{{ number_format($trackAmount, 2) }}</td>
                                        {{-- @endif --}}

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
    <!-- Validation JS -->
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <!-- Datepicker JS -->
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>

@endsection

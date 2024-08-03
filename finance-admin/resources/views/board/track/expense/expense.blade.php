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
    <li class="breadcrumb-item active">Details</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card col-sm-12 col-lg-5  p-3 m-2 text-white text-center mx-auto mb-2"
                style="background-color: #4158D0;
            background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #00DBDE 100%);
            ">
                <div class="text-center">
                    <i data-feather="shopping-bag"></i>
                </div>
                <h5>Total Budget</h5>
                <h1>₱{{ number_format($plannedSum, 2) }}</h1>
            </div>
            <div class="card col-sm-12 col-lg-5  p-3 m-2 text-white text-center mx-auto mb-2"
                style="background-color: #00DBDE;
                background-image: linear-gradient(90deg, #00DBDE 0%, #FC00FF 100%);

            ">
                <div class="text-center">
                    <i data-feather="shopping-bag"></i>
                </div>
                <h5>Remaining Budget</h5>
                <h1>₱{{ number_format($remainingSum, 2) }}</h1>
            </div>
            <div class="col-sm-12">

                <div class="card p-3">
                    <div class="card-header"><a href="#" class="btn-primary btn">Create Budget</a></div>
                    <div class="table-responsive"">
                        <table class="table">
                            <thead>
                                <tr class="">
                                    <th scope="col">Quarter</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Planned</th>
                                    <th scope="col">Actual</th>
                                    <th scope="col">Remaining</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    {{-- <th scope="row" colspan="6">{{ 'Q' . $quarter[0]['quarter'] }}</th> --}}
                                </tr>
                                @foreach ($quarterDepartment as $deptCode => $quarters)
                                    @php
                                        $uniqueQuarters = [];
                                    @endphp

                                    @foreach ($quarters as $quarter)
                                        @if (!in_array($quarter->quarter, $uniqueQuarters))
                                            @php
                                                $uniqueQuarters[] = $quarter->quarter;
                                            @endphp
                                            <tr>
                                                <th scope="col" style="border: none;">{{ 'Q' . $quarter->quarter }}</th>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td style="border: none"></td>
                                        @foreach ($departments as $dept)
                                            @if ($dept->department_code == $deptCode)
                                                <td>{{ $dept->department_name }}</td>
                                            @endif
                                        @endforeach
                                        <td>₱{{ number_format($matchedBudget[$deptCode], 2) }}</td>


                                        @if (isset($matchedTrack[$deptCode]))
                                            <td>₱{{ number_format($matchedTrack[$deptCode], 2) }}</td>
                                            <td>₱{{ number_format($matchedBudget[$deptCode] - $matchedTrack[$deptCode], 2) }}
                                            </td>
                                        @else
                                            <td>₱0.00</td>
                                            <td>₱{{ number_format($matchedBudget[$deptCode], 2) }}</td>
                                        @endif
                                        <td><a href="{{ route('admin.viewBudgetExpense', ['id' => $deptCode]) }}"
                                                class="btn btn-primary">view</a></td>
                                    </tr>

                                @endforeach
                                {{-- <td>₱{{ number_format($item->sum('budget_amount') - $item->sum('budget_approvedAmount'), 2) }} --}}


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

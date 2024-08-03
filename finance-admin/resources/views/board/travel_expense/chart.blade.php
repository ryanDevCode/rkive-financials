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
    <li class="breadcrumb-item">Travel</li>
    <li class="breadcrumb-item active">Tracking</li>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-2 g-4">

        </div>
    </div>


    <script type="text/javascript">
        // Set the session layout variable
        var session_layout = '{{ session()->get('layout') }}';
        // Budget Chart
    </script>

@endsection

@section('script')
    <script src="{{ asset('assets/js/chart/echart/echart-5-4-3.js') }}"></script>
@endsection

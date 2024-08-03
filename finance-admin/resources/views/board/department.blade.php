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
    <li class="breadcrumb-item active">Department</li>
@endsection


@section('content')

    <livewire:admin.department  />

    <x-notify />

    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

@endsection

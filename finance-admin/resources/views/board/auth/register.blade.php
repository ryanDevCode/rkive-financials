@extends('layouts.custom.app')
@section('title', 'Register an account')

@section('css')

@endsection

@section('style')
@endsection

@section('content')

    <livewire:auth.register />

    <x-notify />

    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

@endsection

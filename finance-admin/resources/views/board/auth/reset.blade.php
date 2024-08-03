@extends('layouts.custom.app')
@section('title', 'Reset Password')

@section('css')

@endsection

@section('style')
@endsection

@section('content')

    <livewire:auth.reset />

    <x-notify />

    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

@endsection

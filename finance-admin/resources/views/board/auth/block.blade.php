@extends('layouts.custom.app')
@section('title', 'Access Denied')

@section('css')

@endsection

@section('style')
@endsection

@section('content')

    <livewire:auth.block />

    <x-notify />

    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

@endsection

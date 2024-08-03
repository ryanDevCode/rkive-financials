@extends('layouts.custom.app')
@section('title', 'Login an account')

@section('css')

@endsection

@section('style')
    <style>
        .right {
            background-color: #dde0fc;
        }

        .left {
            background-color: #312B70;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg fill-opacity='0.99'%3E%3Cpolygon fill='%232c2765' points='1600 160 0 460 0 350 1600 50'/%3E%3Cpolygon fill='%23272259' points='1600 260 0 560 0 450 1600 150'/%3E%3Cpolygon fill='%23211d4c' points='1600 360 0 660 0 550 1600 250'/%3E%3Cpolygon fill='%231a163b' points='1600 460 0 760 0 650 1600 350'/%3E%3Cpolygon fill='%230F0D22' points='1600 800 0 800 0 750 1600 450'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }


        .left div {
            margin: 20% 10%;
        }

        .card {
            width: 400px;
        }

        @media (max-width: 700px) {
            .card {
                width: 70%;
            }
        }

        #logo {
            height: 100px;
            width: auto;
            margin: 0;
            /* Set initial position */
            transform: translateY(0);
            /* Define the animation */
            animation: mover 2s infinite alternate;
        }

        #mode {
            height: 75px;
            width: auto;
            margin: 0;
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @media (max-width: 576px) {

            /* Small screens (sm) */
            h4 {
                font-size: 14px;
            }
        }

        @media (max-width: 768px) {

            /* Medium screens (md) */
            h4 {
                font-size: 16px;
            }

            .right {
                background-color: #312B70;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg fill-opacity='0.99'%3E%3Cpolygon fill='%232c2765' points='1600 160 0 460 0 350 1600 50'/%3E%3Cpolygon fill='%23272259' points='1600 260 0 560 0 450 1600 150'/%3E%3Cpolygon fill='%23211d4c' points='1600 360 0 660 0 550 1600 250'/%3E%3Cpolygon fill='%231a163b' points='1600 460 0 760 0 650 1600 350'/%3E%3Cpolygon fill='%230F0D22' points='1600 800 0 800 0 750 1600 450'/%3E%3C/g%3E%3C/svg%3E");
                background-attachment: fixed;
                background-size: cover;
            }
        }
    </style>

@endsection

@section('content')

    <livewire:auth.login />

    <x-notify />

    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

@endsection

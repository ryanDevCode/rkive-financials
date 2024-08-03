<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('assets/images/logo/logo1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo1.png') }}" type="image/x-icon">
    <title>RKIVE</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">

</head>
{{-- @dd(Route::current()->getName()); --}}
<style>
    h1,
    h2,
    h3,
    h4,
    h6,
    li {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        font-style: normal;
    }

    a {
        text-decoration: none;
        color: inherit;
        transition: text-decoration 0.3s ease;
        float: right;
        font-size: 2em;
    }

    /* a:hover {
        text-decoration: underline;
    } */

    .login {
        text-decoration: none;
        color: inherit;
        transition: text-decoration 0.3s ease;
        float: right;
        font-size: 2em;
    }

    .login:hover {
        text-decoration: underline;
    }

    body {
        font-family: "Poppins", sans-serif;
        font-style: normal;
        background: rgb(156, 117, 255);
        background: radial-gradient(circle, rgba(156, 117, 255, 1) 45%, rgba(212, 174, 237, 1) 100%);
        /* background-image: url('assets/svg/default2.svg');
        background-attachment: fixed;
        background-size: cover;
        justify-content: center; */
        /* background-image: url("data:image/<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 2400 800" opacity="0.64"><defs><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="sssurf-grad"><stop stop-color="hsla(265, 94%, 46%, 1.00)" stop-opacity="1" offset="0%"></stop><stop stop-color="hsla(265, 60%, 61%, 1.00)" stop-opacity="1" offset="100%"></stop></linearGradient></defs><g fill="url(#sssurf-grad)" transform="matrix(1,0,0,1,0,-300.9900207519531)"><path d=" M 0 335.0667612226179 Q 800 450 800 305.98005725662387 Q 1600 450 1600 312.595749217091 Q 2400 450 2400 315.3491066641648 L 2400 800 L 0 800 L 0 322.05915192291843 Z" transform="matrix(1,0,0,1,0,87)" opacity="0.05"></path><path d=" M 0 335.0667612226179 Q 800 450 800 305.98005725662387 Q 1600 450 1600 312.595749217091 Q 2400 450 2400 315.3491066641648 L 2400 800 L 0 800 L 0 322.05915192291843 Z" transform="matrix(1,0,0,1,0,174)" opacity="0.21"></path><path d=" M 0 335.0667612226179 Q 800 450 800 305.98005725662387 Q 1600 450 1600 312.595749217091 Q 2400 450 2400 315.3491066641648 L 2400 800 L 0 800 L 0 322.05915192291843 Z" transform="matrix(1,0,0,1,0,261)" opacity="0.37"></path><path d=" M 0 335.0667612226179 Q 800 450 800 305.98005725662387 Q 1600 450 1600 312.595749217091 Q 2400 450 2400 315.3491066641648 L 2400 800 L 0 800 L 0 322.05915192291843 Z" transform="matrix(1,0,0,1,0,348)" opacity="0.53"></path><path d=" M 0 335.0667612226179 Q 800 450 800 305.98005725662387 Q 1600 450 1600 312.595749217091 Q 2400 450 2400 315.3491066641648 L 2400 800 L 0 800 L 0 322.05915192291843 Z" transform="matrix(1,0,0,1,0,435)" opacity="0.68"></path><path d=" M 0 335.0667612226179 Q 800 450 800 305.98005725662387 Q 1600 450 1600 312.595749217091 Q 2400 450 2400 315.3491066641648 L 2400 800 L 0 800 L 0 322.05915192291843 Z" transform="matrix(1,0,0,1,0,522)" opacity="0.84"></path><path d=" M 0 335.0667612226179 Q 800 450 800 305.98005725662387 Q 1600 450 1600 312.595749217091 Q 2400 450 2400 315.3491066641648 L 2400 800 L 0 800 L 0 322.05915192291843 Z" transform="matrix(1,0,0,1,0,609)" opacity="1.00"></path></g></svg>"); */
    }

    .card {
        padding: 3em;
        color: white;
        width: 90%;
        height: 30em;
        margin: auto;
        background-size: cover;
        background-color: #000000;
        background-color: #000000;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 800'%3E%3Cg fill-opacity='0.99'%3E%3Ccircle fill='%23000000' cx='400' cy='400' r='600'/%3E%3Ccircle fill='%230b004e' cx='400' cy='400' r='500'/%3E%3Ccircle fill='%23130055' cx='400' cy='400' r='400'/%3E%3Ccircle fill='%231c005c' cx='400' cy='400' r='300'/%3E%3Ccircle fill='%23250163' cx='400' cy='400' r='200'/%3E%3Ccircle fill='%232D086A' cx='400' cy='400' r='100'/%3E%3C/g%3E%3C/svg%3E");
        background-attachment: fixed;
        background-size: cover;
        border-radius: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    .mini-card {
        text-align: left;
    }

    .mini-card p {
        text-align: left;
        width: 50%;
    }

    .mini-card2 {
        text-align: center;
    }

    .mini-card3 {
        color: black;
        text-align: center;
        /* height: 100px;
        width: 400px; */
        margin: auto;
        /* background-color: white;
        border-radius: 10px; */
        transition: text-decoration 0.3s ease;
        font-size: 1em;
    }


    /* .mini-card3:hover {
        background-color: rgb(186, 26, 245);
        transition: text-decoration 0.3s ease;
    } */

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    /* CSS */
    .button-52 {
        font-size: 2.5em;
        font-weight: 200;
        letter-spacing: 2px;
        padding: 20px 20px;
        outline: 0;
        border: 1px solid rgb(255, 255, 255);
        cursor: pointer;
        position: relative;
        background-color: rgba(0, 0, 0, 0);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-52:after {
        content: "";
        background-color: #ffe54c;
        width: 100%;
        z-index: -1;
        position: absolute;
        height: 100%;
        top: 7px;
        left: 7px;
        transition: 0.2s;
    }

    .button-52:hover:after {
        top: 0px;
        left: 0px;
    }

    @media (min-width: 768px) {
        .button-52 {
            padding: 13px 50px 13px;
        }
    }

    .scroll-container {
        white-space: nowrap;
        /* Prevents text from wrapping */
        overflow: hidden;
        /* Hides overflowing content */
    }

    .scroll {
        display: inline-block;
        /* Ensures content flows horizontally */
        animation: scrollText 30s linear infinite;
        /* Animation properties */
    }

    @keyframes scrollText {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .scroller {
        margin-top: 4em;
    }
</style>

<body>
    <div class="card scroll-container">
        <nav>
            <ul>
                <li><a href="https://fbs.rkiveadmin.com/finance-admin/auth/login" class="login"><span
                            style="font-size: 1em;">Login</span></a>
                </li>
            </ul>
        </nav>
        <div>
            <div class="mini-card">
                <h1>Rkive Administrative Solutions</h1>
                <p>Administrative Management System: Financial and Budget Management,</p>
                <p>and Travel
                    Management with Expense
                    Monitoring</p>
            </div>
            <div class="mini-card2">
                <h4>Login as an Employee or Admin</h4>
            </div>
            <!-- HTML !-->



            <div class="mini-card3">
                <button class="button-52" role="button"><a
                        href="https://fbs.rkiveadmin.com/finance-admin/auth/login">Proceed</a></button>
            </div>
        </div>
        <div class="scroller">
            <p class="scroll">
                Budget planning,
                Budget request and approval workflow,
                Expense report submission,
                Analytics creation,
                Report generation,
                Finance budget approval,
                Travel expense monitoring,
                Travel budget request approval,
                Access control
            </p>

        </div>
    </div>
</body>

</html>

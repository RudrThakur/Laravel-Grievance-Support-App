<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Grievance support system</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top: 50px;
            }

            .title {
                font-size: 84px;
                text-align: center;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            @media (max-width: 576px){
                .title{
                    font-size: 40px;
                    justify-content: center;
                }
            }
            .container {
                width: 100%;
                padding-right: 5px;
                padding-left: 5px;
                margin-right: auto;
                margin-left: auto;
                }

                @media (min-width: 576px) {
                .container {
                    max-width: 540px;
                }
                }

                @media (min-width: 768px) {
                .container {
                    max-width: 720px;
                }
                }

                @media (min-width: 992px) {
                .container {
                    max-width: 960px;
                }
                }

                @media (min-width: 1200px) {
                .container {
                    max-width: 1160px;
                }
                }
            .img-fluid {
                max-width: 100%;
                height: auto;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/index') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <div class="content">
                    <div class="title">
                        Grievance support system
                    </div>
                    <img src="../images/welcome.svg" class="img-fluid" width="400" />
                    <small>An initiative by Rudraksh,Lekhraj,Ankur(KCG 2016-20 final year)</small>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
    </body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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

            @media screen and (max-width: 1024px){
              html, body {
                  height: 170vh;
              }
              .full-height {
                  height: 170vh;
              }
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
            }

            .title {
                font-size: 55px;
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

            .card{
                height:50px;
            }

        </style>
        <!--Bootstrap4-->
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous"
        >

        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
            <div class="content col-12">
                <div class="title m-b-md">
                    Practice2019
                </div>
            </div>

                      <!-- links 1行目-->
                      <div class="row">
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="/memos/home">Memo Manager</a>
                                </div>
                              </div>
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="/reminder/index">Reminder</a>
                                </div>
                              </div>
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="/gallery/index">Gallery</a>
                                </div>
                              </div>
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="/calendar/events">Calendar</a>
                                </div>
                              </div>
                      </div>

                      <!-- links 2行目-->

                      <div class="row">
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="/calendarPro/calendar">CalendarPro</a>
                                </div>
                              </div>
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="background-switcher/home">Background-Switcher</a>
                                </div>
                              </div>
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="/approval/front">Comment Approval</a>
                                </div>
                              </div>
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="/mail/sendemail">Simple Email Sender</a>
                                </div>
                              </div>
                      </div>

                      <!-- links 3行目-->

                      <div class="row">
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="">xxx</a>
                                </div>
                              </div>
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="">xxx</a>
                                </div>
                              </div>
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="">xxx</a>
                                </div>
                              </div>
                              <div class="col-md-3 p-2">
                                <div class="card text-center pt-3">
                                <a href="">xxx</a>
                                </div>
                              </div>
                      </div>

                </div>
        </div>
    </body>
</html>

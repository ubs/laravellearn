<?php
use Illuminate\Support\Facades\Route;
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Drive - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/ubs.generic.css') }}"  rel="stylesheet" type="text/css">
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"-->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="title m-b-md">
                    Laravel Drive!
                </div>

                @include('commons.mainnav')

                <?php $infoBarVariableIsSet = isset($infoBarMessage) && !empty($infoBarMessage); ?>
                @if ($infoBarVariableIsSet)
                    @include('commons.infobar')
                @endif
                
                <div id="pagesidebar">
                @section('sidebar')
                	This is the master sidebar.
                @show
                </div>
                
                <div class="content">
                	@yield('content')
                </div>
            </div>

        </div>
    </body>
</html>
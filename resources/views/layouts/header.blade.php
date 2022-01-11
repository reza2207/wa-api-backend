<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NOVA CMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand text-white title" href="{{ url('/')}}">NOVA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        @auth
                        <a  href="{{ url('/home') }}" class="me-3 py-2  text-white text-decoration-none">Home</a>    
                        <a href="{{ url('/articles') }}" class="me-3 py-2 text-white text-sm text-decoration-none">Articles</a>
                        <a class="me-3 py-2 text-white text-sm text-decoration-none btn btn-danger" style="border-radius: 21px" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        
                            <a href="{{ url('/home') }}" class="me-3 py-2  text-white text-decoration-none">Home</a>
                            <a href="{{ url('/articles') }}" class="me-3 py-2 text-white text-sm text-decoration-none">Articles</a>
                            
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="me-3 py-2 text-white text-decoration-none btn btn-danger" style="border-radius: 21px">Sign Up</a>
                            @endif
                        @endauth
                
                    </nav>
                </div>
            </div>
        </nav>
        @yield('content')
        @extends('layouts/footer')
    
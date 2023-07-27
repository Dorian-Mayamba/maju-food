@extends('layouts.app')

@section('content')
    <div class="jumbotron" id="banner">
        <div class="bg-image h-100">
            <picture>
                <source media="(min-device-width: 720px)" srcset="{{ asset('images/food-bg-full-screen.jpg') }}">
                <img src="{{ asset('images/food-bg.jpeg') }}" alt="food-bg">
            </picture>
        </div>
    </div>
    <div class="Goals my-3">
        <h1 class="text-center bg-dark text-light">Nos objectifs</h1>
        <div class="goal-paragraph w-50 mx-auto">
            <p>
                Ammener un sentiment de partage et de découverte en vous faisant voyager à travers nos
                délicieux plats aux saveurs africaines. Nous voulons inspirer nos consommateurs en partageant
                nos recettes, nos plats ont aussi pour but de pousser nos consommateurs à decouvrir des specialités
                africaines.
            </p>
        </div>
    </div>
    <div class="network-banner my-3">
        <picture>
            <source media="(min-width:1280px )" srcset="{{ asset('images/maju-food-social.jpeg') }}">
            <img src="{{ asset('images/maju-food-social-820.jpg') }}" alt="social-bg">
        </picture>
    </div>
    <div class="networking-section">
        <h1 class="text-center bg-dark text-light" id="network">Nos reseaux</h1>
        <div class="networking-content row w-100 justify-content-center my-4">
            <div class="col-md-4 offset-md-4 my-3">
                <div class="fb-icon w-25">
                    <a href="https://www.facebook.com/madomasifood">
                        <img class="w-75" src="{{ asset('images/facebook-icon.png') }}" alt="maju-food" title="maju-food">
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ig-icon w-25">
                    <a href="https://www.instagram.com/majufood68/">
                        <img class="w-75" src="{{ asset('images/ig-icon.png') }}" alt="maju-food" title="maju-food">
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center w-100" id="return-link-section">
            <div class="col-md-4 offset-md-3">
                <div class="return-link">
                    <a href="#navigationMenu" class="btn btn-lg btn-primary">Retourner au menu</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection

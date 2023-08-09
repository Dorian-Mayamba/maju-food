@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="text-center">A la carte</h1>
    </div>
    <div class="container-fluid">
        <div class="row mb-5 bg-dark text-light text-center">
            <h1 class="py-3"><small>Plats</small></h1>
            @foreach($meals as $meal)
            <div class="col-md-4 mb-4">
                    <div class="image">
                        <img class="w-50" style="object-fit: cover; aspect-ratio: 1/1;" src="{{ asset($meal->meal_image) }}" alt="{{ $meal->meal_name }}" title="{{ $meal->meal_name }}">
                    </div>
                    <div class="meal-name">
                        <h2><small>{{ $meal->meal_name }}</small></h2>
                    </div>
                    <div class="meal-price">
                        <h3><small>{{ $meal->price }}€</small></h3>
                    </div>
                    <div class="category">
                        <h2><small>{{$meal->category->name}}</small></h2>
                    </div>
                    <div class="network-link mb-4">
                        <a href="{{ route('home') }}#network" class="btn btn-lg btn-warning">Cliquez ici pour commander!!!</a>
                    </div>
                @if(\Illuminate\Support\Facades\Auth::user() && Auth::user()->role->type == "admin")
                    <div class="buttons">
                        <div class="update-button mb-3">
                            <a href="{{ route('update-meal', $meal->id) }}" class="btn btn-lg btn-warning">Modifier</a>
                        </div>
                        <div class="delete-button mb-3">
                            <a href="#" class="btn btn-danger btn-lg">Supprimer</a>
                        </div>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="row mb-5 bg-dark text-light text-center">
            <h1 class="py-3"><small>Boissons</small></h1>
            @foreach($drinks as $drink)
            <div class="col-md-4 mb-4">
                    <div class="image">
                        <img class="w-50" style="object-fit:cover; aspect-ratio:1/1;" src="{{ asset($drink->meal_image) }}" alt="{{ $drink->meal_name }}" title="{{ $drink->meal_name }}">
                    </div>
                    <div class="meal-name">
                        <h2><small>{{ $drink->meal_name }}</small></h2>
                    </div>
                    <div class="meal-price">
                        <h3><small>{{ $drink->price }}€</small></h3>
                    </div>
                    <div class="category">
                        <h2><small>{{$drink->category->name}}</small></h2>
                    </div>
                    <div class="network-link mb-4">
                        <a href="{{ route('home') }}#network" class="btn btn-lg btn-warning">Cliquez ici pour commander!!!</a>
                    </div>
                @if(\Illuminate\Support\Facades\Auth::user() && Auth::user()->role->type == "admin")
                    <div class="buttons">
                        <div class="update-button mb-3">
                            <a href="{{ route('update-meal', $drink->id) }}" class="btn btn-lg btn-warning">Modifier</a>
                        </div>
                        <div class="delete-button mb-3">
                            <a href="#" class="btn btn-danger btn-lg">Supprimer</a>
                        </div>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="row mb-5 bg-dark text-light text-center">
            <h1 class="py-3"><small>Accompagnements</small></h1>
            @foreach($sides as $side)
            <div class="col-md-4 mb-4">
                    <div class="image">
                        <img class="w-50" style="object-fit:cover; aspect-ratio:1/1;" src="{{ asset($side->meal_image) }}" alt="{{ $side->meal_name }}" title="{{ $side->meal_name }}">
                    </div>
                    <div class="meal-name">
                        <h2><small>{{ $side->meal_name }}</small></h2>
                    </div>
                    <div class="meal-price">
                        <h3><small>{{ $side->price }}€</small></h3>
                    </div>
                    <div class="category">
                        <h2><small>{{$side->category->name}}</small></h2>
                    </div>
                    <div class="network-link mb-4">
                        <a href="{{ route('home') }}#network" class="btn btn-lg btn-warning">Cliquez ici pour commander!!!</a>
                    </div>
                @if(\Illuminate\Support\Facades\Auth::user() && Auth::user()->role->type == "admin")
                    <div class="buttons">
                        <div class="update-button mb-3">
                            <a href="{{ route('update-meal', $side->id) }}" class="btn btn-lg btn-warning">Modifier</a>
                        </div>
                        <div class="delete-button mb-3">
                            <a href="#" class="btn btn-danger btn-lg">Supprimer</a>
                        </div>
                    </div>
                @endif
            </div>
            @endforeach
            
        </div>
    </div>
@endsection

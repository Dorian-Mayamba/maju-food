@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('create-meal') }}" method="post">
            <div class="form-group my-4">
                <input class="form-control" type="text" class="form-control" name="meal_name" id="meal_name" placeholder="Nom du plat" required>
            </div>
            <div class="form-group my-4">
                <select class="form-control" name="category_name" id="category_name" required>
                    <option value="" selected>Type de plat</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-4">
                <textarea class="form-control" type="text" class="form-control" name="meal_description" id="meal_description" placeholder="Description du plat" required></textarea>
            </div>
            <div class="form-group my-4">
                <input class="form-control" type="file" name="meal_image" id="meal_image" enctype="multipart/form-data" placeholder="ajouter un fichier" required>
            </div>
            <div class="form-group my-4 text-center">
                <input type="submit" value="Valider" class="btn btn-lg btn-success form-control w-75">
            </div>
        </form>
    </div>
@endsection

@section('extra-css')

@endsection

@extends('layouts.app')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="text-danger">
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">

        <form action="{{ route('create-meal') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group my-4">
                <input class="form-control" type="text" class="form-control" name="meal_name" id="meal_name" placeholder="Nom du plat" required>
            </div>
            <div class="form-group my-4">
                <select class="form-control" name="meal_category" id="meal_category" required>
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
                <input type="text" class="form-control" name="price" id="price" placeholder="prix du plat">
            </div>
            <div class="form-group my-4">
                <input class="form-control" type="file" name="meal_image" id="meal_image" enctype="multipart/form-data" placeholder="ajouter un fichier" required>
            </div>
            <div class="form-group my-4 text-center">
                <input type="submit" value="Valider" class="btn btn-lg btn-success form-control">
            </div>
        </form>
    </div>
@endsection

@section('extra-css')

@endsection

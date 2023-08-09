@extends('layouts.app')


@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="text-danger">
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <form action="{{ route('update-meal', $meal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <input class="form-control" type="text" name="meal_name" id="meal_name" value="{{ $meal->meal_name }}" required>
            </div>
            <div class="form-group mb-4">
                <select class="form-control" name="meal_category" id="meal_category" required>
                    <option value="{{ $meal->category->name }}">{{ $meal->category->name }}</option>
                    @foreach($categories as $category)
                        @if($category->name != $meal->category->name)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <textarea name="meal_description" id="meal_description" cols="30" rows="10" class="form-control" required>{{ $meal->meal_description }}</textarea>
            </div>
            <div class="form-group mb-4">
                <input type="number" name="price" id="price" value="{{ $meal->price }}" required>
            </div>
            <div class="form-group mb-4">
                <input type="file" name="meal_image" id="meal_image" class="form-control">
            </div>
            <div class="form-group mb-4">
                <input type="submit" class="form-control btn-warning btn-lg btn" value="Update">
            </div>
        </form>
    </div>
@endsection

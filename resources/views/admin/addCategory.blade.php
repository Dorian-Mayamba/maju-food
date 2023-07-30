@extends('layouts.app')

@section('content')

<div class="container-fluid">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="text-danger">
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('create-category') }}" method="post" class="form">
        @csrf
        <div class="form-group">
            <input type="text" name="category_name" id="category_name" class="form-control" placeholder="type de plat">
        </div>
        <div class="form-group">
            <input type="submit" value="Ajouter" class="btn btn-lg btn-success form-control">
        </div>
    </form>
</div>

@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Menu</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Add Menu</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add Menu
            </div>
            <!-- Add Menu Form -->
            <div class="card-body d-flex justify-content-center align-items-center">
                <form action="{{ route('restaurant.menus.store', ['restaurant_id' => $restaurant_id]) }}" method="POST" enctype="multipart/form-data" class="col-lg-6">
                    @csrf
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant_id }}">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                    <br>
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                    <br>
                    <label for="price">Price:</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                    <br>
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    <br>
                    <label for="ingredients">Ingredients:</label>
                    <div>
                        @foreach ($ingredients as $ingredient)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}"> {{ $ingredient->name }}
                            </label>
                        @endforeach
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add Menu</button>
                </form>
            </div>
        </div>
        
    </div>
@endsection

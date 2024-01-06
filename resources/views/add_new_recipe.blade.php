@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Restaurant</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">  Add Restaurant</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add Recipe
            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <div class="col-lg-6 invoice-col">
                    <form action="{{ route('recipe.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="name">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                        <br>
                    
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                        <br>


                        <label for="description">Steps:</label>
                        <textarea name="steps" id="steps" class="form-control" required></textarea>
                        <br>
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                        <br>
                        <label for="opening_time">Serving</label>
                        <input type="number" name="serving" id="serving" class="form-control" required>
                        <br>
                        <label for="closing_time">Price</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                        <br>
                        <label for="name">Select category:</label>
                        <div class="form-group">
                       
                        <div class="col-md-4">
                        <select id="category" name="category" class="form-control">
                            <option value="1" >Lunch</option>
                            <option value="2" >Dinner</option>
                            <option value="3">Breakfast</option>
                            <option value="4">Drinks</option>
                        </select>
                        </div>
                        </div>
                       
                        <div>
                        <br>
                        <br>
                        <label for="name">Select Ingredient:</label>
                        <br>
                        @foreach ($ingredients as $ingredient)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}"> {{ $ingredient->name }}
                            </label>
                        @endforeach
                        <br>
                        <br>
                    </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
        
        
    
    </div>
@endsection

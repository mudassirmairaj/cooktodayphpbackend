@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Recipe</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">  Edit Recipe</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
               {{$recipe->title}}
            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <div class="col-lg-6 invoice-col">
                    <form action="{{ route('updateRecipe' , ['recipeId' => $recipe->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="name">Title:</label>
                        <textarea type="text" name="title" id="title" class="form-control" required>{{$recipe->title}}</textarea>
                        <br>
                    
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required>{{$recipe->description}}</textarea>
                         <br>


                        <label for="description">Steps:</label>
                        <textarea name="steps" id="steps" class="form-control" required>{{$recipe->steps}}</textarea>
                        <br>
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                        <br>
                        <label for="opening_time">Serving</label>
                        <textarea type="number" name="serving" id="serving" class="form-control" required>{{$recipe->serving}}</textarea>
                        <br>
                        <label for="closing_time">Price</label>
                        <textarea type="number" name="price" id="price" class="form-control" required>{{$recipe->price}}</textarea>
                        <br>
                       
                       
                        <div>
                       
                      
                        <br>
                    </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
        
        
    
    </div>
@endsection

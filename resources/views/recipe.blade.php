@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Recipe</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Recipe</li>
        </ol>
    
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Recipe
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th> 
                        <th>Desc</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>No. of Person</th>
                        <th>View/Edit</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>S.No</th>  
                        <th>Name</th> 
                        <th>Desc</th>  
                        <th>Image</th>
                        <th>Opening Time</th>
                        <th>Closing Time</th>
                        <th>Menu</th>
                    
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($recipe as $re)
                        <tr>
                            <td>{{ $re->id }}</td>
                            <td>{{ $re->title }}</td>
                            <td>{{ $re->description }}</td>
                            <td>
                            @if ($re->image)
                                <img src="{{$re->image}}" alt="{{ $re->name }}" width="100">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $re->price }}</td>
                            <td>{{ $re->serving }}</td>
                            <td>
                                <a href="{{ route('recipeEdit', ['recipeId' => $re->id]) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Orders</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Orders</li>
        </ol>
    
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
             Orders
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>S.No</th>
                    
                        <th>User</th>
                        <th>Restaurant</th>
                       
                        <th>Total</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Created date</th>
                        <th>Updated Date</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>S.No</th>    
                        <th>User</th>
                        <th>Restaurant</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Created date</th>
                        <th>Updated Date</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($orders as $ord) 
                        <tr>
                            <td>{{ $ord->id }}</td>
                            <td>{{ $ord->user->name }}</td>
                            <td>{{ $ord->orderRecipe->title }}</td>
                            <td>{{ $ord->total_price }}</td>
                            @if($ord->status == 'pending')
                            <td><strong class="text-primary">PENDING</strong></td>
                            @elseif($ord->status == 1)
                            <td><strong class="text-info">SELECTED</strong></td>
                            @elseif($ord->status == 2)
                            <td><strong class="text-success">DELIEVERED</strong></td>
                            @else
                            <td><strong class="text-danger">CANCELLED</strong></td>
                            @endif
                            <td>
                                <a href="{{ route('getOrderById', ['id' => $ord->id]) }}">View</a>
                            </td>
                            <td>{{ $ord->created_at }}</td>
                            <td>{{ $ord->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

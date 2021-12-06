@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Category page</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Product Name</td>
                    <td>Product Description</td>
                    <td>Product Image</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="cate-image" alt="image here"> 
                    </td>
                    <td>
                        <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr> 
                @endforeach
                
            </tbody>
        </table>

    </div>
</div>
@endsection
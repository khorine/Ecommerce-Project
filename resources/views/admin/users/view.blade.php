@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Details
                        <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-right">Back</a>
                    </h4>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Role</label>
                            <div class="p-2 border">{{ $users->role_as == '0'? 'User':'Admin' }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">First Name</label>
                            <div class="p-2 border">{{ $users->name }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Last Name</label>
                            <div class="p-2 border">{{ $users->lname }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">{{ $users->email }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Contact</label>
                            <div class="p-2 border">{{ $users->phone }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Address</label>
                            <div class="p-2 border">{{ $users->address }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Deliver Address</label>
                            <div class="p-2 border">{{ $users->delivery_address }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Town</label>
                            <div class="p-2 border">{{ $users->town }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">City</label>
                            <div class="p-2 border">{{ $users->city }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">County</label>
                            <div class="p-2 border">{{ $users->county }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Postal Code</label>
                            <div class="p-2 border">{{ $users->pincode }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Registered Users</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Contact</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name.' '.$user->lname}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <a href="{{ url('view-user/'.$user->id) }}" class="btn btn-primary btn-sm">View</a>
                        
                    </td>
                </tr> 
                @endforeach
                
            </tbody>
        </table>

    </div>
</div>
@endsection
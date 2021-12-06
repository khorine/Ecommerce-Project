@extends('layouts.front')

@section('title')

      Checkout
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                Home
            </a> /
            <a href="{{ url('checkout') }}">
                Checkout
            </a> 
        </h6> 
    </div>    
</div> 

<div class="container mt-3">
    <form action="{{ url('place-order') }}" method="POST">
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Deatils</h6>
                    <hr>
                    <div class="row check-out">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control firstname" value="{{ Auth::user()->name }}" placeholder="Enter First Name">
                              <span id="fname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" class="form-control lastname" value="{{ Auth::user()->lname }}" placeholder="Enter Last Name">
                            <span id="lname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control email" value="{{ Auth::user()->email }}" placeholder="Enter Email">
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone" class="form-control phone" value="{{ Auth::user()->phone }}" placeholder="Enter Phone Number">
                            <span id="phone_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address</label>
                            <input type="text"class="form-control address" value="{{ Auth::user()->address }}" placeholder="Enter Address">
                            <span id="address_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Delivery Address</label>
                            <input type="text" name="delivery_address" class="form-control deliveryAddress" value="{{ Auth::user()->delivery_address }}" placeholder="Enter Shipping Address">
                            <span id="d_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Town</label>
                            <input type="text" name="town" class="form-control town" value="{{ Auth::user()->town }}" placeholder="Enter Nearest Delivery Town">
                            <span id="town_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">City</label>
                            <input type="text" name="city" class="form-control city" value="{{ Auth::user()->city }}" placeholder="Enter City">
                            <span id="city_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">County</label>
                            <input type="text" name="county" class="form-control county" value="{{ Auth::user()->county }}" placeholder="Enter County">
                            <span id="county_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">Pin Code</label>
                            <input type="text" name="pincode" class="form-control pincode" value="{{ Auth::user()->pincode }}" placeholder="Enter Pin Code">
                            <span id="pincode_error" class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                @if($cartItems->count() > 0)
                <div class="card-body">
                    <h6>Order Details</h6>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cartItems as $item)
                            <tr>
                                @php $total += ($item->products->selling_price * $item->prod_qty); @endphp
                                <td>{{ $item->products->name }}</td>
                                <td>{{ $item->prod_qty }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h6 class="px-2">Total Amount <span class="float-end">KSh {{ $total }}</span></h6>
                    <hr>
                    <input type="hidden" name="payment_mode" value="COD">
                    <button type="submit" class="btn btn-primary float-end w-100">Place Order</button>
                    <button type="button" class="btn btn-primary w-100 mt-3 mpesa-btn">Pay with Mpesa</button>
                </div>
                @else
                   <div class="card-body text-center">
                   <h4>You have no items on the <i class="fa fa-shopping-cart"></i> Cart</h4>
                   <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Add items to Continue</a>
                </div>

                @endif
            </div>
        </div>
    </div>
</form>
</div>
@endsection
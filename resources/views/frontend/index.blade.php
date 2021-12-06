@extends('layouts.front')

@section('title')
Welcome to HKM E-shop 
@endsection

@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
                <h5>Featured Products</h5>
                {{-- <div class="owl-carousel featured-carousel owl-theme"> --}}
                    
                    @foreach ($featured_products as $prod)
                    <div class="col-md-3 mt-3">
                        <a href="{{ url('category/'.$prod->category->slug.'/'.$prod->slug) }}">
                        {{-- <div class="item"> --}}
                            <div class="card">
                               <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" class="w-50" alt="Product image">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                </a>
                                    <span class="float-start">{{ $prod->selling_price }}</span>
                                    <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                               </div>
                            {{-- </div> --}}
                        </div>
                        </div>
                    @endforeach
                {{-- </div> --}}
            </div>
        </div>
    </div>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <h5>Trending Category</h5>
                    {{-- <div class="owl-carousel featured-carousel owl-theme"> --}}
                        @foreach ($trending_category as $category)
                        {{-- <div class="item"> --}}
                            <div class="col-md-3 mt-3">
                                <a href="{{ url('category/'.$category->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'.$category->image) }}" class="w-50"
                                    alt="Category image">
                                    <div class="card-body">
                                        <h5>{{ $category->name }}</h5>
                                        <p>
                                            {{ $category->meta_descrip }}
                                        </p>
                                    </div>
                                {{-- </div> --}}
                                </div>
                            </a>
                        </div>
                        @endforeach
                    {{-- </div> --}}
                </div>
            </div>
        </div>

        @endsection

        @section('scripts')
        <script>
            $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                     items:3
                },
                1000:{
                     items:4
                }
            }
        })
        </script>
        @endsection
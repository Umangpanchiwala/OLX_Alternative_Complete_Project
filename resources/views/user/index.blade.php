@extends('user/layout')
@section('content')

<!--===============================
                        =            Hero Area            =
                        ================================-->

<style>
    span {
        white-space: pre-line;
    }

    imge {
        height: 310px;
        width: 310px;
    }
</style>

<section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>Buy & Sell Near You </h1>
                    <p>Join the millions who buy and sell from each other <br> everyday in local communities around the
                        world</p>
                    <div class="short-popular-category-list text-center">
                        <h2>Category</h2>
                        <ul class="list-inline">
                            @foreach($category as $val)
                            <li class="list-inline-item">
                                <a href="#"><i class="fa fa-car"></i>
                                    {{$val['category_name']}}</a>
                            </li>

                            @endforeach
                        </ul>
                    </div>

                </div>
                <!-- Advance Search -->
                <div class="advance-search">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 align-content-center">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control my-2 my-lg-1" id="inputtext4" placeholder="What are you looking for">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <select class="w-100 form-control mt-lg-1 mt-md-2">
                                                <option>Select Category</option>
                                                @foreach($category as $val)
                                                <option value="{{ $val['id'] }}">{{$val['category_name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2 align-self-center">
                                            <button type="submit" class="btn btn-primary">Search Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>

<!--===================================
                        =            Client Slider            =
                        ====================================-->


<!--===========================================
                        =            Popular deals section            =
                        ============================================-->

<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Trending Adds</h2>
                    <p>Some trending products may you like it.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- product card -->
            @if (count($Products) > 0)
            @foreach ($Products as $Product)
            <div class="product-item bg-light">
                <div class="card">
                    <div class="thumb-content">
                        <div class="col-md-6" style="padding:0px;">
                            <div class="card-body">
                                <a href="{{ asset('user/single') }}/{{$Product->id}}">
                                    <img src="{{ asset('/image/ads') }}/{{ $Product->img }}" class="imge" style="height: 260px; width: 340px;">
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $Product->title }}</h4>
                            <ul class="list-inline product-meta">
                                <li class="list-inline-item">
                                    <a href="{{ asset('user/single') }}/{{$Product->id}}"><i class="fa fa-folder-open-o"></i>{{ $Product->cate->category_name }}</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><i class="fa fa-calendar"></i>{{ $Product->created_at }}</a>
                                </li>
                            </ul>
                            <div class="card-text" value="{{ $Product->description }}">
                            </div>
                            <div class="product-ratings">
                                <ul class="list-inline">
                                    <li class="list-inline-item selected"><i class="fa fa-star"></i>
                                    </li>
                                    <li class="list-inline-item selected"><i class="fa fa-star"></i>
                                    </li>
                                    <li class="list-inline-item selected"><i class="fa fa-star"></i>
                                    </li>
                                    <li class="list-inline-item selected"><i class="fa fa-star"></i>
                                    </li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class="lead">No ACTIVE todo tasks</p>
            @endif

        </div>
    </div>
    </div>
</section>





<!--==========================================
                        =            All Category Section            =
                        ===========================================-->

<section class=" section">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section title -->
                <div class="section-title">
                    <h2>All Categories</h2>
                    <p>Here You Can choose the catagories you want to buy.</p>
                </div>
                <div class="row">
                    <!-- Category list -->
                    @foreach($category as $val)
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="header d-inline">
                            <h3>
                                <i class="fa fa-laptop icon-bg-1"></i>

                            </h3>
                            <h4>{{$val['category_name']}}</h4>
                        </div>

                    </div>
                
                @endforeach


            </div>
        </div>
    </div>
    </div>
    <!-- Container End -->
</section>


<!--====================================
                        =            Call to Action            =
                        =====================================-->

<section class="call-to-action overly bg-3 section-sm">
    <!-- Container Start -->
    <div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-md-8">
                <div class="content-holder">
                    <h2>Start today to get more exposure and
                        grow your business</h2>
                    <ul class="list-inline mt-30">
                        <li class="list-inline-item"><a class="btn btn-main" href="{{ asset('user/ad-listing') }}">Add Listing</a></li>
                        <li class="list-inline-item"><a class="btn btn-secondary" href="">Browser Listing</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
@endsection
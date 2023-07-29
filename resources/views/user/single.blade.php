@extends('user/layout')
@section('content')
<style>
    .m-auto {
        margin-right: auto !important;
        margin-left: auto !important;
        margin: auto !important;
        width: 550px
    }
</style>
<section class="page-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Advance Search -->
                <div class="advance-search">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="What are you looking for">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control my-2 my-lg-0" id="inputCategory4" placeholder="Category">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control my-2 my-lg-0" id="inputLocation4" placeholder="Location">
                            </div>
                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-primary">Search Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--===================================
        =            Store Section            =
        ====================================-->
<section class="section bg-gray">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <!-- Left sidebar -->
            <div class="col-md-8">
                <div class="product-details">
                    <h1 class="product-title">{{$arr->title}}</h1>
                    <img src="{{ asset('/image/ads') }}/{{ $arr->img }}" class="m-auto">
                    <div class="product-meta">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="">{{ $arr->username }}</a></li>
                            <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="">{{$arr->cate->category_name}}</a></li>
                          
                        </ul>
                    </div>
                    <!-- product slider -->

                    <!-- product slider -->
                    <div class="content mt-5 pt-5">
                        <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Product Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Specifications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <h3 class="tab-title">Product Description</h3>
                                <p>{{$arr->Description}}</p>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <h3 class="tab-title">Product Specifications</h3>
                                <table id="w0" class="table table-striped table-bordered detail-view">
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $arr->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $arr->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $arr->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>{{ $arr->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>{{ $arr->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $arr->cate->category_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sub Category</th>
                                        <td>{{ $arr->subcate->subcategory_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $arr->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $arr->description }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <h3 class="tab-title">Product Review</h3>
                                <div class="product-review">
                                    <div class="media">
                                        <!-- Avater -->
                                        <img src="images/user/user-thumb.jpg" alt="avater">
                                        <div class="media-body">
                                            <!-- Ratings -->
                                            <div class="ratings">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="fa fa-star"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="name">
                                                <h5>Jessica Brown</h5>
                                            </div>
                                            <div class="date">
                                                <p>Mar 20, 2018</p>
                                            </div>
                                            <div class="review-comment">
                                                <p>
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                    accusantium doloremqe laudant tota rem ape
                                                    riamipsa eaque.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-submission">
                                        <h3 class="tab-title">Submit your review</h3>
                                        <!-- Rate -->
                                        
                                        <div class="review-submit">
                                            <form action="#" class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="col-12">
                                                    <textarea name="review" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-main">Sumbit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="widget price text-center">
                        <h4>Price</h4>
                        <p>₹{{$arr->price}}</p>
                    </div>
                    <!-- User Profile widget -->
                    <div class="widget user text-center">
                        <img class="rounded-circle img-fluid mb-5 px-5" src="images/user/user-thumb.jpg" alt="">
                        <h4><a href="">{{ $arr->username }}</a></h4>
                        <!-- <p class="member-time">Member Since Jun 27, 2017</p> -->
                        <a href="">See all ads</a>
                        <ul class="list-inline mt-20">
                            <li class="list-inline-item"><a href="" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a>
                            </li>
                            <li class="list-inline-item"><a href="{{ url('user/order/'.$arr->id) }}" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Order Now</a></li>
                        </ul>
                    </div>
                    <!-- Rate Widget -->
                    <div class="widget rate">
                        <!-- Heading -->
                        <h5 class="widget-header text-center">What would you rate
                            <br>
                            this product
                        </h5>
                        <!-- Rate -->
                        <div class="starrr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
@endsection
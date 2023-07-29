@extends('user/layout')
@section('content')
    <!--================================
        =            Page Title            =
        =================================-->
    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>Book Order</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <section class="section">
        <div class="container">
            <div class="row d-flex justify-content-center mb-3">
                <center>
                    <h4>Enter Your Address</h4>
                </center>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="{{ url('order/create') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $pid }}">
                        <input type="hidden" name="user_id" value="{{ session()->get('FRONT_USER_ID') }}">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">country</label>
                                    <input type="text" name="country" id="" class="form-control" required
                                        placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">state</label>
                                    <input type="text" name="state" id="" class="form-control" required
                                        placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">city</label>
                                    <input type="text" name="city" id="" class="form-control" required
                                        placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">pin code</label>
                                    <input type="number" name="pincode" id="" class="form-control" required
                                        placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="">full address </label><br>
                                    <textarea name="full_address" id="" cols="70" rows="1"> </textarea>
                                </div>
                            </div>
                        </div>







                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-3"></div>

            </div>
        </div>
    </section>
@endsection

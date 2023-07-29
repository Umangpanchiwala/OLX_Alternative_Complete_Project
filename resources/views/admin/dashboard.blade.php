@extends('admin.layout')
@section('page_title','Welcome Back Admin !')
@section('dashboard_select','active')
@section('container')

<div class="main-content"><h2>Welcome Back Admin !</h2>
     <section class="statistic statistic2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item statistic__item--green">
                                        
                                        <h2 class="number">10,368</h2>
                                        <span class="desc">members online</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-account-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item statistic__item--orange">
                                        <h2 class="number">388,688</h2>
                                        <span class="desc">items sold</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item statistic__item--blue">
                                        <h2 class="number">1,086</h2>
                                        <span class="desc">this week</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-calendar-note"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item statistic__item--red">
                                        <h2 class="number">$1,060,386</h2>
                                        <span class="desc">total earnings</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-money"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
    <div class="col-lg-6">
        <div class="au-card m-b-30">
            <div class="au-card-inner">
                <h3 class="title-2 m-b-40">Ads</h3>
                <canvas id="team-chart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="au-card m-b-30">
            <div class="au-card-inner">
                <h3 class="title-2 m-b-40">Single Bar Chart</h3>
                <canvas id="singelBarChart"></canvas>
            </div>
        </div>
    </div>
    </div>
@endsection

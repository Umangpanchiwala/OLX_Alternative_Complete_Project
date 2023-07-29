@extends('admin/layout')
@section('container')

<style>
    .im{
        width: 600px;
       height: auto;
       
    }
    .m{
        margin-right: 25px;
    }
</style>
<div class="main-content">
    <div class="card">
        <div class="card card-header">
            <h2>Product View
                <div class="float-right">

                    &nbsp;
                    <a class="btn btn-primary" href="">Chat</a>&nbsp;&nbsp;
                    <a class="btn btn-secondary " href="{{ url('admin/product') }}">Back</a>

                </div>
            </h2>
        </div>
        {{-- <div class="col-md-6"> --}}

        <div class="row">

            <div class="col-md-6">

                <div class="card-body">
                    <table id="w0" class="table table-striped table-bordered detail-view">
                        <tr>
                            <th>Title</th>
                            <td>{{$arr->title }}</td>
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
            </div>
            {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->

                    <!-- Wrapper for slides -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

                    </ol> --}}
            <div class="col-md-6" style="padding:0px;">
                <div class="card-body m">
                    <img class="im" src="{{ asset('/image/ads') }}/{{ $arr->img }}" >
                </div>
            </div>

        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

@extends('admin/layout')
@section('page_title', 'Category')
@section('category_select', 'active')
@section('container')


    <div class="main-content">
        <div class="card">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('delete'))
                <div class="alert alert-danger" role="alert">
                    {{ session('delete') }}
                </div>
            @endif

            <div class="card card-header">
                <h2> Category </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-right">
                            <a class="btn btn-success " href="{{ url('admin/manage_category') }}">Add Category</a>
                        </div><br><br>

                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>C_Name</th>
                                        <th>C_Slug</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $list)

                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td>{{ $list->category_name }}</td>
                                            <td>{{ $list->category_slug }}</td>
                                            <td>
                                                <div class="w3-third">
                                                    <div class="w3-card">
                                                        <img src="{{ asset('/image') }}/{{ $list->img }}" style="height:96px " style="width:96px ">
                                                      <div class="w3-container">
                                                        <h4>{{ $list->category_name }}</h4>
                                                      </div>
                                                    </div>
                                                  </div>
                                            </td>
                                            <td>
                                                @if($list->status == 1)
                                            <a class="btn btn-success"
                                                    href="{{ url('admin/category/status/') }}/{{ $list->id }}"><i
                                                        class="fas fa-danger"></i>Active</a> &nbsp; 
                                                     @else   
                                                        <a class="btn btn-danger"
                                                    href="{{ url('admin/category/status/') }}/{{ $list->id }}"><i
                                                        class="fas fa-success"></i>InActive</a> 
                                                @endif
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('admin/category_edit') }}/{{ $list->id }}"><i
                                                        class="fas fa-edit"></i></a> 
                                                        <!-- &nbsp; <a class="btn btn-danger"
                                                    href="{{ url('admin/category_delete') }}/{{ $list->id }}"><i
                                                        class="fas fa-trash"></i></a> </td> -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>


                {{-- <script>
                    $(function() {
                        $('.toggle-class').change(function() {
                            var status = $(this).prop('checked') == true ? 1 : 0;
                            var id = $(this).data('id');
                            console.log(status);
                            $.ajax({
                                type: "GET",
                                dataType: "json",
                                url: '/userChangeStatus',
                                data: {
                                    'status': status,
                                    'id': id
                                },
                                success: function(data) {
                                    console.log(data.success)
                                }
                            });
                        })
                    })
                </script> --}}
            @endsection

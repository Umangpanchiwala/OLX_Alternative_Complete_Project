@extends('admin/layout')
@section('page_title','SubCategory')
@section('subcategory_select','active')
@section('container')
<div class="main-content">
    <div class="card">
        @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
        @endif
        <div class="card card-header">
            <h2> Sub Category </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="float-right">
                        <a class="btn btn-success " href="{{ url('admin/manage_subcategory') }}">Add SubCategory</a>
                    </div><br><br>

                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category_Name</th>
                                    <th>main_category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $list)
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->subcategory_name }}</td>
                                    <td>{{ $list->category->category_name }}</td>
                                    <td>
                                        @if($list->status == 1)
                                        <a class="btn btn-success" href="{{ url('admin/subcategory/status/') }}/{{ $list->id }}"><i class="fas fa-danger"></i>Active</a> &nbsp;
                                        @else
                                        <a class="btn btn-danger" href="{{ url('admin/subcategory/status/') }}/{{ $list->id }}"><i class="fas fa-success"></i>InActive</a>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-primary" href="../admin/subcategory_edit/{{ $list->id }}"><i class="fas fa-edit"></i></a> 
                                    <!-- &nbsp; <a class="btn btn-danger" href="../admin/subcategory_delete/{{ $list->id}}"><i class="fas fa-trash"></i></a> </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
            <script>
                function changeUserStatus(_this, id) {
                    var status = $(_this).prop('checked') == true ? 1 : 0;
                    let _token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: `/change-status`,
                        type: 'post',
                        data: {
                            _token: _token,
                            id: id,
                            status: status
                        },
                        success: function(result) {}
                    });
                }
            </script>
            @endsection
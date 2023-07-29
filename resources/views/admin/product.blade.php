@extends('admin/layout')
@section('page_title', 'Product')
@section('product_select', 'active')
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
                <h2> Product </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-right">
                        </div>
                        <a class="btn btn-secondary " href="{{ url('admin/manage_product') }}"> Back</a><br><br>
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Status</th>
                                        {{-- <th>Created At</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($data as $list)
                                
                                    <tr>
                                        <td>{{ $list->id }}</td>
                                        <td>{{ $list->title }}</td>
                                        <td>{{ $list->username }}</td>
                                        <td>{{ $list->cate->category_name }}</td>
                                        <td>{{ $list->subcate->subcategory_name}}</td>
                                        
                                        <td>
                                             @if($list->status == 1)
                                            <a class="btn btn-success"
                                                    href="{{ url('admin/product/status/') }}/{{ $list->id }}"><i
                                                        class="fas fa-danger"></i>Active</a> &nbsp; 
                                                     @else   
                                                        <a class="btn btn-danger"
                                                    href="{{ url('admin/product/status/') }}/{{ $list->id }}"><i
                                                        class="fas fa-success"></i>InActive</a> 
                                                @endif
                                            </td>
                                        {{-- <th>{{ $list->created_at }}</th> --}}

                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ url('admin/product_edit') }}/{{ $list->id }}"><i
                                                    class="fas fa-edit"></i></a> &nbsp;
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ url('admin/view_product') }}/{{ $list->id }}"><i
                                                    class="fas fa-eye"></i></a>&nbsp;
                                            <a class="btn float-right btn-sm btn-danger"
                                                href="{{ url('admin/product_delete') }}/{{ $list->id }}"><i
                                                    class="fas fa-trash"></i>
                                            </a>
                                        </td>
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

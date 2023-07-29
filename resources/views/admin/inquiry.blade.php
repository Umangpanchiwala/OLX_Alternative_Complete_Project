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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Category</th>
                                        
                                    </tr>
                                </thead>

                                @foreach ($data as $list)
                                
                                    <tr>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->email }}</td>
                                        <td>{{ $list->message }}</td>
                                        <td>{{ $list->category }}</td>
                                        
                                      
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

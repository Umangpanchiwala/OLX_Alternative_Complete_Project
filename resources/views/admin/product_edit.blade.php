@extends('admin/layout')
@section('page_title','Edit Product')
@section('product_edit','active')
@section('container')
    <div class="main-content">
        <div class="card">
            <div class="card card-header">
                <h2>Edit Product</h2>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="float-right">
                        <a class="btn btn-secondary " href="{{ url('admin/product') }}"> Back</a>
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" enctype="multipart/form-data"action="{{ url('/admin/product_update') }}/{{ $data->id }}">
                                @csrf
                                <div class="form-group">
                                    <label for="category" class="category">Category</label>
                                    {{-- <input > --}}
                                    <select  id="city" name="category" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false">
                                         <option value="{{ $data->category_id}}">{{ $data->cate->category_name}}</option>
                                         @foreach ($result as $list)
                                         <option value="{{ $list->id }}">{{ $list->category_name }}</option>
                                         @endforeach
                                    </select>
                                    @error('main_category')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sub_category" class="sub_category">Sub Category</label>
                                    {{-- <input > --}}
                                    <select id="user" name="sub_category" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false">
                                         <option value="{{ $data->sub_category_id}}">{{ $data->subcate->subcategory_name}}</option>
                                       
                                    </select>
                                    @error('sub_category')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                    <div class="form-group">
                                    <label for="title" class="title">Title</label>
                                    <input id="title" value="{{ $data->title }}" name="title" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                @error('title')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div>
                                @enderror
                                    </div>
                                    <div class="form-group">
                                    <label for="Description" class="Description">Description</label>
                                    <input id="Description" value="{{ $data->Description }}" name="Description" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                @error('description')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div>
                                @enderror
                                    </div>
                                <div>
                                    <label for="status" class=" form-control-label">Status</label>
                                </div>
                                <div>
                                    <select name="status" id="status" class="form-control">
                                        @if ($data->status==1)
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                        @elseif ($data->status==0)
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                        @endif
                                    </select>
                                </div>
                          </div>
                    </div><br>
                    <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#city').on('change', function(e) {
                var cat_id = e.target.value;
    
                $.ajax({
                    url: "{{ route('myform') }}",
                    type: "get",
                    data: {
                        cat_id: cat_id
                    },
    
                    success: function(response) {
                        $("#user").empty();
                        var len = 0;
                        if (response.data != null) {
                            len = response.data.length;
                        }
                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                var id = response.data[i].id;
                                var name = response.data[i].subcategory_name;
    
                                var option = "<option value='" + id + "'>" + name + "</option>";
                                $("#user").append(option);
    
                            }
                        }
                    }
                })
            });
        });
    </script>

@endsection

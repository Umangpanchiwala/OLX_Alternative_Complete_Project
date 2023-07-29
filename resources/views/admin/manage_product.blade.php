@extends('admin/layout')

@section('container')
<div class="main-content">
    <div class="card">
        <div class="card card-header">
            <h2>Manage SubCategory</h2>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="float-right">
                    <a class="btn btn-secondary " href="{{ url('admin/product') }}">Back</a>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('product.save') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category" class="category">Category</label>
                                {{-- <input > --}}
                                <select name="category_id" type="text" class="browser-default custom-select" id="city" aria-required="true" aria-invalid="false">
                                    <option value="">Select Category</option>
                                    @foreach ($result as $list)
                                    <option value="{{ $list->id }}">{{ $list->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sub_category" class="sub_category">Sub_category</label>
                                {{-- <input > --}}
                                <select name="sub_category_id" type="text" class="browser-default custom-select" id="user" aria-required="true" aria-invalid="false">
                                </select>
                                @error('sub_category')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col col-4 mu10">
                                <label for="file-input" class=" form-control-label">Image</label>
                                <div>
                                    <input type="file" id="img" name="img" class="form-control-file" required>
                                </div>
                            </div>
                            <div>
                                <label for="status" class=" form-control-label">Status</label>
                            </div>
                            <div>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                    </div>
                </div><br>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-save fa-lg"></i>&nbsp;
                        Save
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
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
@extends('user/layout')
@section('content')
<style>
    .custom-select[multiple],
    .custom-select[size]:not([size="1"]) {
        height: auto;
        padding-right: .75rem;
        background-image: none
    }

    .custom-select:disabled {
        color: #6c757d;
        background-color: #e9ecef
    }

    .custom-select::-ms-expand {
        opacity: 0
    }

    .custom-select-sm {
        height: calc(1.8125rem + 2px);
        padding-top: .375rem;
        padding-bottom: .375rem;
        font-size: 75%
    }

    .custom-select-lg {
        height: calc(2.875rem + 2px);
        padding-top: .375rem;
        padding-bottom: .375rem;
        font-size: 125%
    }
</style>
<section class="ad-post bg-gray py-5">
    <div class="container">
        <form action="{{ route('product.save') }}" method="post" enctype="multipart/form-data">
            <!-- Post Your ad start -->
            @csrf
            <fieldset class="border border-gary p-4 mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Post Your ad</h3>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold pt-4 pb-1">Title Of Ad:</h6>
                        <input type="text" name="title" class="border w-100 p-2 bg-white text-capitalize" placeholder="Ad title go There" required>
                        <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                        <textarea name="description" id="" class="border p-3 w-100" rows="7" required placeholder="Write details about your product"></textarea>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold pt-4 pb-1">Select Ad Category:</h6>
                        <select name="category_id" id="city" class="custom-select w-100">
                            <option value="">Select category</option>
                            @foreach ($result as $list)
                            <option value="{{$list->id}}">{{$list->category_name}}</option>
                            @endforeach
                        </select>
                        <h6 class="font-weight-bold pt-4 pb-1">Select Sub Category:</h6>
                        <select name="sub_category_id" id="cate" class="w-100 custom-select">
                        <option value="">Select Sub category</option>
                        </select>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold pt-4 pb-1">Phone No:</h6>
                                {{-- <div class="row px-3"> --}}
                                {{-- <div class="col-lg-6 mr-lg-4 rounded bg-white my-2 "> --}}
                                <input type="tel" name="phone" class="border-0 py-2 w-100 Phone" placeholder="Enter Your Phone No" id="phone" required>
                                {{-- </div> --}}
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold pt-4 pb-1">Item Price (INR):</h6>
                                {{-- <div class="col-lg-6 mrx-4 rounded bg-white my-2 "> --}}
                                <input type="text" name="price" class="border-0 py-2 w-100 price" placeholder="Price" id="price" required>
                            </div>
                            <div class="col-md-6">    
                                <input type="hidden" name="username" class="border-0 py-2 w-100 username" value="{{ session()->get('FRONT_USER_ID') }}" id="username" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="choose-file text-center my-4 py-4 rounded" id="img">
                    <label for="file-upload">
                        <span class="d-block font-weight-bold text-dark">Drop files anywhere to upload</span>
                        <span class="d-block">or</span>
                        <span class="d-block btn bg-primary text-white my-3 select-files">Select files</span>
                        <span class="d-block">Maximum upload file size: 500 KB</span>
                        <input type="file" class="form-control-file d-none" id="file-upload" name="img">
                    </label>
                </div>


            </fieldset>
            <!-- Post Your ad end -->

            <!-- submit button -->
            <div class="checkbox d-inline-flex">
                <input type="checkbox" id="terms-&-condition" class="mt-1">
                <label for="terms-&-condition" class="ml-2">By click you must agree with our
                    <span> <a class="text-success" href="terms-condition.html">Terms & Condition and Posting Rules.</a></span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary d-block mt-2">Post Your Ad</button>
        </form>
    </div>
</section>

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
                url: "{{ route('mycate') }}",
                type: "get",
                data: {
                    cat_id: cat_id
                },

                success: function(response) {
                    $("#cate").empty();
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response.data[i].id;
                            var name = response.data[i].subcategory_name;

                            var option = "<option value='" + id + "'>" + name + "</option>";
                            $("#cate").append(option);
                        }
                    }
                }
            })
        });
    });
</script>

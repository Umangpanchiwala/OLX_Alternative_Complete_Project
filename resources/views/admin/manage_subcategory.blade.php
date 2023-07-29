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
                        <a class="btn btn-secondary " href="{{ url('admin/subcategory') }}">Back</a>
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('subcategory.insert') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="subcategory_name" class="category_name">Category</label>
                                    <input id="subcategory_name" name="subcategory_name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required=''>
                                    @error('subcategory_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="main_category" class="main_category">Main_category</label>
                                    {{-- <input > --}}
                                    <select id="main_category" name="category_id" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false">
                                         <option value="">Select Category</option>
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
                            <i class="fa fa-submit fa-lg"></i>&nbsp;
                            Submit
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

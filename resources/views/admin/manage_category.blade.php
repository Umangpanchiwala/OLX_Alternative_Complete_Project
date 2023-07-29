@extends('admin/layout')

@section('container')
    <div class="main-content">
        <div class="card">
            <div class="card card-header">
                <h2>Manage Category</h2>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="float-right">
                        <a class="btn btn-secondary " href="{{ url('admin/category') }}">Back</a>
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('category.insert') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name" class="category_name">Category</label>
                                    <input id="category_name" name="category_name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required=''>
                                @error('category_name')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div>
                                @enderror
                                    </div>
                                <div class="form-group">
                                    <label for="category_slug" class="category_slug">Category_slug</label>
                                    <input id="category_slug" name="category_slug" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                @error('category_slug')
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
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                        </div>
                            <div class="col col-4 mu10">
                                <label for="file-input" class=" form-control-label">Image</label>
                            <div >
                                <input type="file" id="img" name="img" class="form-control-file" required>
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

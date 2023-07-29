@extends('admin/layout')
@section('page_title','Edit Category')
@section('category_edit','active')
@section('container')
<div class="main-content">
    <div class="card">

        <div class="card card-header">
            <h2>Edit Category</h2>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="float-right">
                    <a class="btn btn-secondary " href="{{ url('admin/category') }}"> Back</a>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" enctype="multipart/form-data" action="{{ url('/admin/category_update') }}/{{ $data->id }}">
                            @csrf
                            <div class="form-group">
                                <label for="category_name" class="category_name">Category</label>
                                <input id="category_name" value="{{ $data->category_name }}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required=''>
                                @error('category_name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_slug" class="category_slug">Category_slug</label>
                                <input id="category_slug" value="{{ $data->category_slug }}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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
                    <input type="hidden" name="hide" value="{{ $data->img }}">
                    <div class="col col-4 mu10">
                        <label for="file-input" class=" form-control-label">Image</label>
                        <div><img src="{{  asset('/image')}}/{{ $data->img }}" height="96" width="96">
                            <input type="file" name="img" class="form-control-file">
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
@endsection
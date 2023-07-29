@extends('admin/layout')
@section('page_title','Edit Category')
@section('subcategory_edit','active')
@section('container')
<div class="main-content">
    <div class="card">

        <div class="card card-header">
            <h2>Edit Category</h2>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="float-right">
                    <a class="btn btn-secondary " href="{{ url('admin/subcategory') }}"> Back</a>
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" enctype="multipart/form-data" action="{{ url('/admin/subcategory_update') }}/{{ $data->id }}">
                            @csrf
                            <div class="form-group">
                                <label for="category_name" class="category_name">Category</label>
                                <input id="category_name" value="{{ $data->subcategory_name }}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required=''>
                                @error('category_name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="main_category" class="main_category">Main_category</label>
                                {{-- <input > --}}
                                <select id="main_category" name="main_category" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                    <option value="{{ $data->main_category }} " >{{ $data->main_category }}</option>
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

@endsection

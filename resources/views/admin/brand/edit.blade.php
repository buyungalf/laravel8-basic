@extends('admin.admin_master')

@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Brand
                    </div>
                    <div class="card-body">
                        <form action="{{ url('brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                            <div class="form-group">
                                <label for="brand_name">Update Brand Name</label>
                                <input type="text" value="{{ $brands->brand_name }}" class="form-control" name="brand_name" aria-describedby="emailHelp">
                                @error('brand_name')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="brand_image">Update Brand Image</label>
                                <img style="width: 400px" src="{{ asset($brands->brand_image) }}" alt="">
                            </div>
                            <div class="form-group">

                                <input type="file" class="form-control" name="brand_image">
                                @error('brand_image')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
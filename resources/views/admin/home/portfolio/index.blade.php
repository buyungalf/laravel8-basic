@extends('admin.admin_master')

@section('admin')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-group">
                    @foreach($images as $img)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset($img->image) }}" alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add Images
                </div>
                <div class="card-body">
                    <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="brand_image">Brand Image</label>
                            <input type="file" class="form-control" name="image[]" aria-describedby="emailHelp" multiple>
                            @error('brand_image')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
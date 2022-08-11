@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Home Services</h2>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/services/update/'.$services->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="{{ $services->title }}" id="title" name="title" placeholder="Slider Title">
                        @error('title')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $services->description }}</textarea>
                        @error('description')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" value="{{ $services->icon }}" class="form-control" id="icon" name="icon" placeholder="Slider Title">
                        @error('icon')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" value="{{ $services->color }}" class="form-control" id="color" name="color" placeholder="Slider Title">
                        @error('color')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                        <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Home About</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('store.about') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">About Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Slider Title">
                        @error('title')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="long_desc">Long Description</label>
                        <textarea class="form-control" id="long_desc" name="long_desc" rows="3"></textarea>
                        @error('long_desc')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="short_desc">Short Description</label>
                        <input type="text" class="form-control" id="short_desc" name="short_desc" placeholder="Slider Title">
                        @error('short_desc')
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
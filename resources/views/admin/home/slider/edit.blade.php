@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Basic Form Controls</h2>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/slider/update/'.$sliders->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Slider Title</label>
                        <input type="text" class="form-control" value="{{ $sliders->title }}" id="title" name="title" placeholder="Slider Title">
                    </div>

                    <div class="form-group">
                        <label for="description">Slider Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $sliders->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Slider Image</label><br>
                        <input type="file" class="form-control-file" id="image" name="image">
                        <input type="hidden" class="form-control-file" id="image" name="old_image" value="<?= $sliders->image; ?>">
                        <br>
                        <img style="width: 400px" src="{{ asset($sliders->image) }}" alt="">
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
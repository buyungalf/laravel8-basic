@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Home About</h2>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/contact/update/'.$contact->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">About Title</label>
                        <input type="text" class="form-control" value="{{ $contact->email }}" id="email" name="email" placeholder="Slider Title">
                        @error('email')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Long Description</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ $contact->address }}</textarea>
                        @error('address')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Short Description</label>
                        <input type="text" value="{{ $contact->phone }}" class="form-control" id="phone" name="phone" placeholder="Slider Title">
                        @error('phone')
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
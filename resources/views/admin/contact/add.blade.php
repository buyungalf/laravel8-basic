@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Contact</h2>
            </div>

            <div class="card-body">
                <form action="{{ route('store.contact') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Contact Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Contact Email">
                        @error('email')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Contact Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact Phone">
                        @error('phone')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Contact Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                        @error('address')
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
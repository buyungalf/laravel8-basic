@extends('admin.admin_master')

@section('admin')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Change Password</h2>
            </div>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('change_password') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Current Password</label>
                        <input type="password" name="cpassword" class="form-control" id="current_password" placeholder="Password">
                        @error('cpassword')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if(session('error'))
                        <span class="text-danger">{{ session('error') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlPassword">New Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlPassword" placeholder="Password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlPassword">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlPassword" placeholder="Password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
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
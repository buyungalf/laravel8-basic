@extends('admin.admin_master')

@section('admin')
<?php $i = 1 ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Home About</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <span class="mdi mdi-home"></span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Home
                            </li>
                            <li class="breadcrumb-item" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>

                <div>
                    <a href="{{ route('admin.about.add') }}">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-contact"> Add About
                        </button>
                    </a>
                </div>
            </div>
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Short Description</th>
                            <th scope="col">Long Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($homeAbout as $about)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->short_desc }}</td>
                            <td>{{ $about->long_desc }}</td>
                            <td width="15%">
                                <a href="{{ url('admin/about/edit/'.$about->id) }}" class="btn btn-primary"><i class="mdi mdi-square-edit-outline"></i></a>
                                <a href="{{ url('admin/about/delete/'.$about->id) }}" onclick="return confirm('Are you sure to delete the selected data?')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
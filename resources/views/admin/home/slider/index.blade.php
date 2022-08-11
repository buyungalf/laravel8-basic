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
                            <li class="breadcrumb-item" aria-current="page">Slider</li>
                        </ol>
                    </nav>
                </div>

                <div>
                    <a href="{{ route('add.slider') }}">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-contact"> Add Slider
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
                            <th scope="col">SN</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td><img src="{{ asset($slider->image) }}" style="width: 160px; height: 90px" alt=""></td>
                            <td>
                                <a href="{{ url('admin/slider/edit/'.$slider->id) }}" class="btn btn-primary"><i class="mdi mdi-square-edit-outline"></i></a>
                                <a href="{{ url('admin/slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure to delete the selected data?')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></a>
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
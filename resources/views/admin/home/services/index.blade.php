@extends('admin.admin_master')

@section('admin')
<?php $i = 1 ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Home Services</h1>
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
                            <li class="breadcrumb-item" aria-current="page">Services</li>
                        </ol>
                    </nav>
                </div>

                <div>
                    <a href="{{ route('admin.services.add') }}">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-contact"> Add Services
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
                            <th scope="col">Description</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Color</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($homeServices as $services)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $services->title }}</td>
                            <td>{{ $services->description }}</td>
                            <td>
                                <h2>
                                    <span class="mdi mdi-{{$services->icon}}"></span>
                                </h2>
                            </td>
                            <td>{{ $services->color }}</td>
                            <td>
                                <a href="{{ url('admin/services/edit/'.$services->id) }}" class="btn btn-primary"><i class="mdi mdi-square-edit-outline"></i></a>
                                <a href="{{ url('admin/services/delete/'.$services->id) }}" onclick="return confirm('Are you sure to delete the selected data?')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></a>
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
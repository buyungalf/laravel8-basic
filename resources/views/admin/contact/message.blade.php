@extends('admin.admin_master')

@section('admin')
<?php $i = 1 ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <span class="mdi mdi-home"></span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Contact
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $s)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->email }}</td>
                            <td>{{ $s->subject }}</td>
                            <td>{{ $s->message }}</td>
                            <td width="15%">
                                <a href="{{ url('admin/message/delete/'.$s->id) }}" onclick="return confirm('Are you sure to delete the selected data?')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></a>
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
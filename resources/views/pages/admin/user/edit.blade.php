@extends('layouts.admin')

@section('title')
    User
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">User</h2>
            <p class="dashboard-subtitle">Edit User</p>
        </div>
        <div class="dashboard-content">
            <!-- Table -->
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="name" class="form-label">Nama User</label>
                                        <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="email" class="form-label">Eamil User</label>
                                        <input type="email" class="form-control" name="email" value="{{ $item->email }}" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="password" class="form-label">Password User</label>
                                        <input type="password" class="form-control" name="password">
                                        <small>Kosongkan Jika Anda Tidak Ingin Mengganti Password</small>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="roles" class="form-label">Roles</label>
                                        <select name="roles" class="form-select form-control" required>
                                            <option selected value="{{ $item->roles }}">Tidak Diganti</option>
                                            <option value="ADMIN">Admin</option>
                                            <option value="USER">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-success mt-3 px-5 float-end">Save Now</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
        </div>
    </div>
</div>
<!-- Section Content End -->
@endsection

@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Category</h2>
            <p class="dashboard-subtitle">Edit Category</p>
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
                            <form action="{{ route('category.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="name" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="photo" class="form-label">Foto</label>
                                        <input type="file" class="form-control" name="photo">
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

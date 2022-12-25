@extends('layouts.admin')

@section('title')
    Product
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Product</h2>
            <p class="dashboard-subtitle">Create New Product</p>
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
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="name" class="form-label">Nama Product</label>
                                        <input type="text" class="form-control" name="name" value="" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="user" class="form-label">Pemilik Product</label>
                                        <select name="users_id" class="form-select form-control" required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="categories_id" class="form-label">Kategori Product</label>
                                        <select name="categories_id" class="form-select form-control" required>
                                            @foreach ($categories as $categories)
                                                <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="price" class="form-label">Price Product</label>
                                        <input type="number" class="form-control" name="price" value="" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi Product</label>
                                        <textarea name="description" id="editor1"></textarea>
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

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endpush

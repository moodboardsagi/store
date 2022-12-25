@extends('layouts.admin')

@section('title')
    Product Gallery
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Product Gallery</h2>
            <p class="dashboard-subtitle">Create New Product Gallery</p>
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
                            <form action="{{ route('product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="user" class="form-label">Product</label>
                                        <select name="products_id" class="form-select form-control" required>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="formFileMultiple" class="form-label">Foto Product</label>
                                        <input type="file" class="form-control" name="photos" id="formFileMultiple" multiple required>
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

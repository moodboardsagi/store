@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Detail
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">{{ $product->name }}</h2>
            <p class="dashboard-subtitle">Product Details</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('dashboard-product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Kategori</label>
                                            <select name="categories_id" class="form-select form-control" required>
                                                <option value="{{ $product->categories_id }}" selected>Tidak diganti ({{ $product->category->name }})</option>
                                                @foreach ($categories as $categories)
                                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" id="editor1">{!! $product->description !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-grid mt-2">
                                        <button type="submit" class="btn btn-success btn-lg px-5">
                                            Update Product
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Gallery -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($product->galleries as $gallery)
                                    <div class="col-md-4">
                                        <div class="gallery-container">
                                            <img src="{{ Storage::url($gallery->photos ?? '') }}" class="w-100"/>
                                            <a class="delete-gallery" href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}">
                                                <img src="/images/icon-delete.svg"/>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-12 mt-3 d-grid gap-2">
                                    <form action="{{ route('dashboard-product-gallery-upload') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="products_id" value="{{ $product->id }}">
                                        <input type="file" id="file" style="display: none;" name="photos" multiple onchange="form.submit()"/>
                                        <button type="button" class="btn btn-lg btn-secondary d-grid" onclick="thisFileUpload();">
                                            Add Photo
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Gallery End -->
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
    <script>
        function thisFileUpload() {
            document.getElementById("file").click();
        }
    </script>
@endpush

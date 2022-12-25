@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Create
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create New Product</h2>
            <p class="dashboard-subtitle">Create your own product</p>
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
                    <form action="{{ route('dashboard-product-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="number" class="form-control" name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Kategori</label>
                                            <select name="categories_id" class="form-select form-control" required>
                                                @foreach ($categories as $categories)
                                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" id="editor1"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Thumbnails</label>
                                            <input type="file" name="photo" class="form-control" id="formFileMultiple" multiple>
                                            <small class="text-muted">
                                                Kamu dapat memilih lebih dari satu file
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 d-grid">
                                <button type="submit" class="btn btn-success btn-lg px-5">
                                    Create Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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

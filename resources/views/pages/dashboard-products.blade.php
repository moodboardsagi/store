@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Products</h2>
            <p class="dashboard-subtitle">Manage it well and get money</p>
        </div>
        <div class="dashboard-content">
            <!-- Create Product -->
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('dashboard-product-create') }}" class="btn btn-success btn-lg">Add New Product</a>
                </div>
            </div>
            <!-- Create Product End -->
            <!-- Card Product -->
            <div class="row mt-4">
                @foreach ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a href="{{ route('dashboard-product-details', $product->id) }}" class="card card-dashboard-product d-block">
                            <div class="card-body">
                                <img src="{{ Storage::url($product->galleries->first()->photos ?? '') }}" class="w-100 mb-2">
                                <div class="product-title">{{ $product->name }}</div>
                                <div class="product-category">{{ $product->category->name }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Card Product End -->
        </div>
    </div>
</div>
<!-- Section Content End -->
@endsection

@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
    <!-- Page Content -->
    <div class=" page-content page-home">
        <!-- Carousel -->
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/images/banner.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/banner.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/banner.jpg" class="d-block w-100" alt="...">
                                </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                    <span class="" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                    <span class="" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Carousel End -->

        <!-- Categories -->
        <section class="store-trend-categories mt-4">
            <div class="container">
                <!-- title -->
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                    <h5>Trend Categories</h5>
                    </div>
                </div>
                <!-- title end -->
                <!-- Content -->
                <div class="row">
                    @php
                        $incrementCategory = 0
                    @endphp
                    @forelse ($categories as $category)
                        <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                            <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                                <div class="categories-image">
                                    <img src="{{ Storage::url($category->photo) }}" class="w-100">
                                </div>
                                <p class="categories-text">
                                    {{ $category->name }}
                                </p>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            No Categories Found
                        </div>
                    @endforelse
                </div>
                <!-- Content End -->
            </div>
        </section>
        <!-- Categories end -->

        <!-- Products -->
        <section class="store-new-products">
            <div class="container">
                <!-- Title -->
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>New Products</h5>
                    </div>
                </div>
                <!-- Title End -->
                <!-- Content -->
                <div class="row">
                    @php
                        $incrementProduct = 0
                    @endphp
                    @forelse ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct+= 100 }}">
                            <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image"
                                    style="
                                        @if ($product->galleries->count())
                                            background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                                        @else
                                            background-color: #eee
                                        @endif
                                        "></div>
                                </div>
                                <div class="products-text">
                                    {{ $product->name }}
                                </div>
                                <div class="products-price">
                                    Rp. {{ $product->price }}
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            No Products Found
                        </div>
                    @endforelse
                </div>
                <!-- Content End -->
            </div>
        </section>
        <!-- Products End -->
    </div>
    <!-- Page Content End -->
@endsection

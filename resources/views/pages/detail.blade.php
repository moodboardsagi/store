@extends('layouts.app')

@section('title')
    Store Detail Page
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-details">
        <!-- Breadcrumb -->
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb End -->

        <!-- Gallery -->
        <section class="store-gallery mb-4" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image">
                        </transition>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                                <a href="#" @click="changeActive(index)">
                                    <img :src="photo.url" class="w-75 thumbnail-image" :class="{ active: index == activePhoto }">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery End -->

        <!-- Content Product -->
        <div class="store-details-container" data-aos="fade-up">
            <!-- Title Product -->
            <div class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <h1>{{ $product->name }}</h1>
                            <div class="owner">By {{ $product->user->store_name }}</div>
                            <div class="price">Rp. {{ number_format($product->price) }}</div>
                        </div>
                        <div class="col-lg-3" data-aos="zoom-in">
                            @auth
                            <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-success px-4 mb-3 text-white d-block w-75">Add to Cart</button>
                            </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-success px-4 mb-3 text-white d-block w-75">Sign In To Add</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title Product End -->
            <!-- Descripsi Product -->
            <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </section>
            <!-- Descripsi Product End -->
            <!-- Review Product -->
            <section class="store-review">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-9 mt-3 mb-3">
                            <h5>Customer Review (3)</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            {{-- <div class="d-flex">
                                <div class="flex-shrink-0 media">
                                    <img src="/images/icons-testimonial-1.png" class="me-3 rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3 media-body">
                                    <h5 class="mt-0">Hazza Risky</h5>
                                    I thought it was not good for living room. I really happy
                                    to decided buy this product last week now feels like homey.
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 media">
                                    <img src="/images/icons-testimonial-2.png" class="me-3 rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3 media-body">
                                    <h5 class="mt-0">Anna Sukkirata</h5>
                                    Color is great with the minimalist concept. Even I thought it was
                                    made by Cactus industry. I do really satisfied with this.
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 media">
                                    <img src="/images/icons-testimonial-3.png" class="me-3 rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3 media-body">
                                    <h5 class="mt-0">Dakimu Wangi</h5>
                                    When I saw at first, it was really awesome to have with.
                                    Just let me know if there is another upcoming product like this.
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </section>
            <!-- Review Product End -->
        </div>
        <!-- Content Product End -->
    </div>
    <!-- Page Content End -->
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init();
            },
            data: {
                activePhoto: 0,
                photos:     [
                        @foreach ($product->galleries as $gallery)
                            {
                                id: {{ $gallery->id }},
                                url: "{{ Storage::url($gallery->photos) }}",
                            },
                        @endforeach
                    ],
                },
                methods: {
                changeActive(id) {
                    this.activePhoto = id;
                },
            },
        });
    </script>
@endpush

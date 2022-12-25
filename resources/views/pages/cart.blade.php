@extends('layouts.app')

@section('title')
    Store Category Page
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-cart">
        <!-- Breadcrumb -->
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb End -->

        <section class="store-cart">
            <div class="container">
                <!-- Table Cart -->
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name &amp; Seller</th>
                                    <th>Price</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0
                                @endphp
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td style="width: 25%;">
                                            <img src="{{ Storage::url($cart->product->galleries->first()->photos) }}" class="cart-image">
                                        </td>
                                        <td style="width: 35%;">
                                            <div class="product-title">{{ $cart->product->name }}</div>
                                            <div class="product-subtitle">{{ $cart->product->user->store_name }}</div>
                                        </td>
                                        <td style="width: 35%;">
                                            <div class="product-title">Rp. {{ number_format($cart->product->price) }}</div>
                                            <div class="product-subtitle">Rp</div>
                                        </td style="width: 25%;">
                                        <td>
                                            <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-remove-cart">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $totalPrice += $cart->product->price
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Table Cart End -->
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Shipping Details</h2>
                    </div>
                </div>

                <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <div class="row g-3 mb-2" data-aos="fade-up" data-aos-delay="200">
                        <!-- Shipping Details -->
                        <div class="col-md-6">
                            <label for="address_one" class="form-label">Address 1</label>
                            <input type="text" class="form-control" id="address_one" name="address_one" required>
                        </div>
                        <div class="col-md-6">
                            <label for="address_two" class="form-label">Address 2</label>
                            <input type="text" class="form-control" id="address_two" name="addres_two" required>
                        </div>
                        <div class="col-md-4">
                            <label for="provinces_id" class="form-label">Province</label>
                            <select name="provinces_id" class="form-select form-control" id="provinces_id" v-if="provinces" v-model="provinces_id" required>
                                <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                            </select>
                            <select v-else class="form-select form-control"></select>
                        </div>
                        <div class="col-md-4">
                            <label for="regencies_id" class="form-label">City</label>
                            <select name="regencies_id" class="form-select form-control" id="regencies_id" v-if="regencies" v-model="regencies_id" required>
                                <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                            </select>
                            <select v-else class="form-select form-control"></select>
                        </div>
                        <div class="col-md-4">
                            <label for="zip_code" class="form-label">Postal Code</label>
                            <input type="number" class="form-control" id="zip_code" name="zip_code" required>
                        </div>
                        <div class="col-md-6">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                        <!-- Shipping Details End -->
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12">
                            <h2 class="mb-1">Payment Information</h2>
                        </div>
                    </div>
                    <!-- Payment Informations -->
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-2">
                            <div class="product-title">Rp. 0</div>
                            <div class="product-subtitle">Country Tax</div>
                        </div>
                            <div class="col-4 col-md-3">
                            <div class="product-title">Rp. 0</div>
                        <div class="product-subtitle">Product Insurance</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title">Rp. 0</div>
                            <div class="product-subtitle">Ship to Jakarta</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title text-success">Rp. {{ number_format($totalPrice ?? 0) }}</div>
                            <div class="product-subtitle">Total</div>
                        </div>
                        <div class="col-9 col-md-3">
                            <button type="submit" class="btn btn-success mt-4 px-4 d-grid">Checkout Now</button>
                        </div>
                    </div>
                    <!-- Payment Informations End -->
                </form>
            </div>
        </section>
    </div>
    <!-- Page Content End -->
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                AOS.init();
                this.getProvincesData();
            },
            data: {
                provinces: null,
                regencies: null,
                provinces_id: null,
                regencies_id: null,
            },
            methods: {
                getProvincesData() {
                    var self = this;
                    axios.get('{{ route('api-provinces') }}')
                    .then(function(response){
                        self.provinces = response.data;
                    })
                },
                getRegenciesData() {
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                    .then(function(response){
                        self.regencies = response.data;
                    })
                },
            },
            watch: {
                provinces_id: function(val, oldVal) {
                    this.regencies_id = null;
                    this.getRegenciesData();
                }
            }
        });
    </script>
@endpush

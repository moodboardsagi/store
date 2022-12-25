@extends('layouts.auth')

@section('title')
    Store Register Page
@endsection

@section('content')

<!-- Page Content -->
<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-4">
                    <h2>
                        Memulai untuk jual beli
                        dengan cara terbaru
                    </h2>
                    <form method="POST" action="{{ route('register') }}" class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input
                                id="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                v-model="name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                autofocus
                            />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                @change="checkForEmail()"
                                :class="{ 'is-invalid' : this.email_unavailable }"
                                v-model="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                            />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input
                                id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required
                                autocomplete="new-password"
                            />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <input
                                id="password-confirmation"
                                type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                            />
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Store</label>
                            <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                name="is_store_open"
                                type="radio" id="openStoreTrue"
                                v-model="is_store_open"
                                :value="true"
                            />
                            <label class="form-check-label" for="openStoreTrue">Iya, boleh</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                name="is_store_open"
                                type="radio"
                                id="openStoreFalse"
                                v-model="is_store_open"
                                :value="false"
                            />
                            <label class="form-check-label" for="openStoreFalse">Enggak, makasih</label>
                        </div>
                        </div>
                        <div class="mb-3" v-if="is_store_open">
                            <label class="form-label">Nama Toko</label>
                            <input
                                type="text"
                                v-model="store_name"
                                id="store_name"
                                class="form-control @error('store_name') is-invalid @enderror"
                                name="store_name"
                                required
                                autocomplete
                                autofocus
                            />
                            @error('store_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3" v-if="is_store_open">
                            <label class="form-label">Kategori</label>
                            <select class="form-select form-control" name="categories_id" required>
                                <option selected value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-4" :disabled="this.email_unavailable">
                            Sign Up Now
                        </button>
                        <a href="{{ route('login') }} " class="btn btn-signup w-100 mt-2">
                            Back to Sign In
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End -->
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script>
        Vue.use(Toasted);

        var register = new Vue({
            el: '#register',
            mounted() {
                AOS.init();
            },
            methods: {
                checkForEmail: function() {
                    var self = this;
                    axios.get('{{ route('api-register-check') }}',{
                        params: {
                            email: this.email
                        }
                    })
                    .then(function (response) {
                        if(response.data == 'Available'){
                            self.$toasted.show(
                                "Email Anda Tersedia! Silahkan lanjut langkah Selanjutnya!",
                                {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 2000
                                }
                            );
                            self.email_unavailable = false;
                        } else {
                            self.$toasted.error(
                                "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                                {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 2000
                                }
                            );
                            self.email_unavailable = true;
                        }
                        // handle success
                        console.log(response);
                    });
                }
            },
            data() {
                return {
                    name: "Angga Hazza Sett",
                    email: "kamujagoan@bwa.id",
                    is_store_open: true,
                    store_name: "",
                    email_unavailable: false,
                }
            },
        })
    </script>
@endpush

@extends('layouts.dashboard')

@section('title')
    Store Dashboard Account
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Account</h2>
            <p class="dashboard-subtitle">Make store that profitable</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-account') }}" id="locations" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Your Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address_one" class="form-label">Address 1</label>
                                        <input type="text" class="form-control" id="address_one" name="address_one" value="{{ $user->address_one }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address_two" class="form-label">Address 2</label>
                                        <input type="text" class="form-control" id="address_two" name="address_two" value="{{ $user->address_two }}" required>
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
                                        <input type="number" class="form-control" id="zip_code" name="zip_code" value="{{ $user->zip_code }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone_number" class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success btn-lg px-5 float-end">Save Now</button>
                                    </div>
                                </div>
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

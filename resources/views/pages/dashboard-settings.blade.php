@extends('layouts.dashboard')

@section('title')
    Store Dashboard Setting
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Store Settings</h2>
            <p class="dashboard-subtitle">Make store that profitable</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Toko</label>
                                            <input type="text" class="form-control" name="store_name" value="{{ $user->store_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kategori</label>
                                            <select name="categories_id" class="form-select form-control" required>
                                                <option value="{{ $user->categories_id }}" selected>Tidak Diganti</option>
                                                @foreach ($categories as $categories)
                                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Store Status</label>
                                            <p class="text-muted">Apakah saat ini toko Anda buka?</p>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="store_status" id="openStoreTrue" value="1" {{ $user->store_status == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="openStoreTrue">Buka</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="store_status" id="openStoreFalse" value="0" {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : '' }}>
                                                <label class="form-check-label" for="openStoreFalse">Sementara Tutup</label>
                                            </div>
                                        </div>
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

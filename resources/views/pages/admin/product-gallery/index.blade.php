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
            <p class="dashboard-subtitle">List Of Product Gallery</p>
        </div>
        <div class="dashboard-content">
            <!-- Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('product-gallery.create') }}" class="btn btn-primary mb-3">+ Tambah Product Gallery Baru</a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-target w-100" id="crudTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>PRODUK</th>
                                            <th>FOTO</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
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

@push('addon-script')

    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            severSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'product.name', name: 'product.name' },
                { data: 'photos', name: 'photos' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%',
                },
            ]
        })
    </script>

@endpush

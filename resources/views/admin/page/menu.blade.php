@extends('admin.components.master')
@section('title', 'MENU')


@section('container')

    @push('head')
        <meta name="description" content="" />

        <!-- Favicon -->


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/fonts/boxicons.css') }}" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/css/theme-default.css') }}"
            class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('/admin/assets/css/demo.css') }}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

        <link rel="stylesheet" href="{{ asset('/admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="{{ asset('/admin/assets/vendor/js/helpers.js') }}"></script>
        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{ asset('/admin/assets/js/config.js') }}"></script>
    @endpush

    @push('scripts')
        <script src="{{ asset('/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('/admin/assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('/admin/assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('/admin/assets/vendor/js/menu.js') }}"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{ asset('/admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('/admin/assets/js/main.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('/admin/assets/js/dashboards-analytics.js') }}"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js') }}"></script>
    @endpush

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('admin.components.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                @include('admin.components.navbar')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card mb-4">
                                    <h5 class="card-header">MENU</h5>
                                    <div class="card-body">
                                        <form action="{{ route('store.menu') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3 row">
                                                <label for="nama_produk" class="col-md-2 col-form-label">Nama Produk</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" id="nama_produk"
                                                        name="nama" value="{{ old('nama') }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="harga" class="col-md-2 col-form-label">Harga</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="number" id="harga" name="harga"
                                                        {{ old('harga') }} />
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="jenis" class="col-md-2 col-form-label">Jenis Produk</label>
                                                <div class="col-md-10">
                                                    <select class="form-select" id="jenis"
                                                        aria-label="Default select example" name="jenis">
                                                        <option selected>-- Pilih Jenis --</option>
                                                        <option value="Starters">Starters</option>
                                                        <option value="Salads">Salads</option>
                                                        <option value="Specially">Specially</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="spesial" class="col-md-2 form-check-label">spesial</label>
                                                <div class="col-md-10 form-switch">
                                                    <input class="form-check-input"
                                                        style="margin-left: -23px; padding: 10px 23px" type="checkbox"
                                                        id="spesial" name="spesial"
                                                        {{ old('spesial' ? 'checked' : '') }} />
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="formFile" class="col-md-2 col-form-label">Foto</label>
                                                <input class="form-control" type="file" id="formFile" name="foto" />
                                            </div>
                                            <div class="row">
                                                <input class="form-control" type="submit" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Daftar Menu</h5>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Jenis</th>
                                                    <th>Spesial</th>
                                                    <th>Deskripsi</th>
                                                    <th>Gambar</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    // dd($datas);
                                                @endphp
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>
                                                            <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong>{{ $data->nama }}</strong>
                                                        </td>
                                                        <td>{{ $data->harga }}</td>
                                                        <td>
                                                            {{ $data->jenis }}
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge bg-label-{{ $data->spesial == null ? 'danger' : 'success' }} me-1">{{ $data->spesial != null ? 'Spesial' : 'Tidak Spesial' }}</span>
                                                        </td>
                                                        <td>
                                                            <p>{{ $data->deskripsi }}</p>
                                                        </td>
                                                        <td>
                                                            <img src="{{ asset('/storage/' . $data->gambar) }}"
                                                                alt="" width="60px" height="60px">
                                                            {{-- <img src="{{ 'sunshine-backend/public/storage/1670603178Sunshine-foto.jpg' }}" alt="" width="60px" height="60px"> --}}
                                                            {{-- sunshine-backend\public\storage\1670603178Sunshine-foto.jpg --}}
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('showIdMenu', $data->id) }}">
                                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('deleteMenu', $data->id) }}">
                                                                        <i class="bx bx-trash me-1"></i> Delete
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="mt-3 ms-5">
                                            {{ $datas->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('admin.components.footer')

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

@endsection

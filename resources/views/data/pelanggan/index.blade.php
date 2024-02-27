@extends('template.layout_back')<!-- MENGAMBIL TEMPLATE -->

@section('title', 'data pelanggan')

@section('content')
    <div class="main-container container-fluid">
        <div class="breadcrumb-header justify-content-between">
            <div>
                <h4 class="content-title mb-2">Data Pelanggan</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Data Pelanggan</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- CODE UNTUK TABLE -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="pd-t-10 pd-s-10 pd-e-10 bg-white bd-b">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Terakhir input pada : {{ $terakhirInput }}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex my-auto btn-list justify-content-end">
                                    <!--BUTTON TAMBAH PENGGUNA-->
                                    <a class="modal-effect btn btn-sm btn-primary" data-bs-effect="effect-flip-Vertical"
                                        data-bs-toggle="modal" href="#modaldemo8"><i class="fa fa-user-plus"></i> Tambah</a>
                                    <!--BUTTON EXPORT PDF-->
                                    <button aria-expanded="false" aria-haspopup="true"
                                        class="btn ripple btn-sm btn-secondary" data-bs-toggle="dropdown"
                                        type="button">Export<i class="fas fa-caret-down ms-1"></i></button>
                                    <div class="dropdown-menu tx-13">
                                        <h6 class="dropdown-header tx-uppercase tx-11 tx-bold tx-inverse tx-spacing-1">Pilih
                                            Export</h6>
                                        <a class="dropdown-item" href="{{ route('data_pelanggan.export_pdf') }}">PDF</a>
                                        <a class="dropdown-item" href="{{ route('data_pelanggan.export_excel') }}">Excel</a>
                                    </div>
                                    <!--BUTTON IMPORT-->
                                    <a class="modal-effect btn btn-sm btn-success" data-bs-effect="effect-flip-Vertical"
                                        data-bs-toggle="modal" href="#modal_import"><i class="fas fa-cloud-download-alt"></i> Import</a></a>
                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- message info -->
                        @include('components.message') <!-- UNTUK MEMANGGIL MESSAGE -->
                        <hr>
                        <div class="table-responsive">
                            <table id="basic-datatable"
                                class="border-top-0  table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Nama Pelanggan</th>
                                        <th class="border-bottom-0">Alamat</th>
                                        <th class="border-bottom-0">No Telp</th>
                                        <th class="border-bottom-0">Status</th>
                                        <th class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggan as $dt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dt->nama_pelanggan }}</td>
                                            <td>{{ $dt->alamat }}</td>
                                            <td>{{ $dt->nomor_telepon }}</td>
                                            <td>
                                                @if ($dt->penjualan->isNotEmpty())
                                                <span class="badge bg-success-gradient">Sudah Terkait</span>
                                            @else
                                                <span class="badge bg-danger-gradient">Belum Terkait</span>
                                            @endif
                                            </td>
                                            <td>
                                                @if ($dt->penjualan->isNotEmpty())
                                                    
                                                @else
                                                   <!-- BUTTON EDIT -->
                                                   <a class="modal-effect btn btn-sm btn-outline-info"
                                                   data-bs-effect="effect-flip-Vertical" data-bs-toggle="modal"
                                                   href="#modaldemo8{{ $dt->id }}"><i class="fa fa-edit"
                                                       data-bs-toggle="tooltip" title="Update"></i></a>
                                               <!-- BUTTON DELETE -->
                                               <form action="{{ route('data_pelanggan.destroy', $dt->id) }}"
                                                   onsubmit="return confirm('yakin mau hapus data?')" method="post"
                                                   class="d-inline">
                                                   @csrf @method('DELETE')
                                                   <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                           class="fa fa-trash" data-bs-toggle="tooltip"
                                                           title="Delete"></i></button>
                                                   {{-- <a href="{{ route('transaksi', $dt->id) }}"
                                                       class="btn btn-sm btn-outline-warning"><i
                                                           class="fa fa-shopping-cart" data-bs-toggle="tooltip"
                                                           title="Transaksi"></i></a> --}}
                                               </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('data.pelanggan.modal_edit')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('data.pelanggan.modal_create')
    @include('data.pelanggan.modal_import')
@endsection

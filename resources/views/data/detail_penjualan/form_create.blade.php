@extends('Layouts.layout')<!-- MENGAMBIL TEMPLATE -->

@section('title', 'data pelanggan')

@section('content')
    <div class="main-container container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div>
                <h4 class="content-title mb-2">Form Create </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item text-white active">Data Detail Penjualan</li>
                        <li class="breadcrumb-item text-white active">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /breadcrumb -->
        <div class="row row-sm">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Form Detail Penjualan
                        </div>
                        <p class="mg-b-20">Silahkan isi form di bawah ini dengan lengkap.</p>
                        <!-- message info -->
                        @include('components.message')
                        <div class="pd-10 pd-sm-20 bg-gray-100">
                            <form action="{{ route('detail_penjualan.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-3">
                                                        <label class="form-label mg-b-0">Produk </label>
                                                    </div>
                                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                        <select onkeyup="sum();" id="produk_id" name="produk_id"
                                                            class="form-control select2" >
                                                            <option value="" disabled selected>== Pilih Produk ==
                                                            </option>
                                                            @foreach ($produk as $produk)
                                                                <option value="{{ $produk->id }}"
                                                                    data-harga="{{ $produk->harga }}">
                                                                    {{ $produk->nama_produk }} | {{ $produk->formatRupiah('harga') }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-3">
                                                        <label class="form-label mg-b-0">Jumlah Produk </label>
                                                    </div>
                                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                        <input class="form-control" onkeyup="sum();" id="jumlah_produk"
                                                            placeholder="Enter your Jumlah Produk" type="number"
                                                            name="jumlah_produk" value="{{ old('jumlah_produk') }}">
                                                    </div>
                                                </div>
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-3">
                                                        <label class="form-label mg-b-0">Sub Total </label>
                                                    </div>
                                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                        <input class="form-control" name="sub_total" onkeyup="sum();" id="sub_total" readonly
                                                            placeholder="Sub Total" type="number"
                                                            name="sub_total" value="{{ old('sub_total') }}">
                                                    </div>
                                                </div>
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-3">
                                                        <label class="form-label mg-b-0">Nama Pelanggan </label>
                                                    </div>
                                                    <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                        <select name="pelanggan_id" class="form-control" id="">
                                                            <option value="{{$pelanggan->id}}">{{ $pelanggan->nama_pelanggan }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="float-right btn btn-primary pd-x-30 mg-e-5 mg-t-5">
                                    <i class='fa fa-save'></i> Simpan</button>
                                <a href="{{ route('data_produk.index') }}"
                                    class="btn btn-secondary pd-x-30 mg-t-5">
                                    <i class='fa fa-chevron-left'></i> Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(function() {
            // formelement
            $('.select2').select2({
                width: 'resolve'
            });
        });

        function sum() {
            var produk = document.getElementById('produk_id');
            var jumlahProduk = document.getElementById('jumlah_produk').value;

            // Mengambil opsi yang dipilih
            var selectedOption = produk.options[produk.selectedIndex];

            // Mengambil nilai data-harga dari opsi yang dipilih
            var hargaProduk = selectedOption.getAttribute('data-harga');

           var result = parseInt(hargaProduk) * parseInt(jumlahProduk);

           if (!isNaN(result)) {
                document.getElementById('sub_total').value=result;
           }
        }
    </script>



@endsection

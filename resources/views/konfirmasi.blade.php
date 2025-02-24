@extends('layouts.mainlayout')
@section('title', 'Konfirmasi Penyewaan')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="content-in-white">
    <div class="col-lg-12" style="margin:5px">
        <div class="member d-flex align-items-center">
            <span class="border" style="margin:10px">
                <div class="pic">
                    <img src="{{ asset('img/tas/' . $bag->image) }}" class="card-img-top" alt="...">
                </div>
            </span>
            <div class="member-info">
                <div class="card-body">
                    <h1 class="card-title">{{ $bag->brand }}</h1>
                    <p>Harga Sewa per Barang: Rp.{{ number_format($bag->price, 0, ',', '.') }}</p>
                    {{-- <p>Jumlah: {{ $jumlah }}</p> --}}
                    <p>Total Harga: Rp.{{ number_format($totalHarga, 0, ',', '.') }}</p>
                    <form action="{{ route('konfirmasi') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $bag->id }}">
                        {{-- <input type="hidden" name="jumlah" value="{{ $jumlah }}"> --}}
                        <div class="form-group">
                            <label for="payment_method">Pilih Metode Pembayaran:</label>
                            <select name="payment_method" id="payment_method" class="form-control">
                                <option value="credit_card">Kartu Kredit</option>
                                <option value="bank_transfer">Transfer Bank</option>
                                <option value="cash_on_delivery">Bayar di Tempat</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Konfirmasi Penyewaan</button>
                    </form>
                    <a href="/details/{{ $bag->id }}" class="btn btn-secondary" style="margin:5px">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
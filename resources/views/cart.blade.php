@extends('layouts.mainlayout')
@section('title', 'Cart')

@section('content')
<div class="container mt-5 content-in-white">
    <h1>Keranjang Belanja</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($cart)
        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tas : {{ $cart->bag->brand ?? 'Tidak ada tas' }}</td>
                    <td>1</td>
                    <td>Rp.{{ number_format($cart->bag->price ?? 0, 0, ",", ".") }}</td>
                    <td>
                        <form action="{{ route('cart.removeBag') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                            <button type="submit" class="btn btn-secondary">Hapus</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>Sepatu : {{ $cart->shoe->brand ?? 'Tidak ada sepatu' }}</td>
                    <td>1</td>
                    <td>Rp.{{ number_format($cart->shoe->price ?? 0, 0, ",", ".") }}</td>
                    <td>
                        <form action="{{ route('cart.removeShoe') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                            <button type="submit" class="btn btn-secondary">Hapus</button>
                        </form>    
                    </td>                    
                </tr>
                <tr>
                    <td>Tenda : {{ $cart->tent->brand ?? 'Tidak ada tenda' }}</td>
                    <td>1</td>
                    <td>Rp.{{ number_format($cart->tent->price ?? 0, 0, ",", ".") }}</td>
                    <td>
                        <form action="{{ route('cart.removeTent') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                            <button type="submit" class="btn btn-secondary">Hapus</button>
                        </form>
                    </td>                    
                </tr>
                <tr>
                    {{-- Penghitungan untuk menampilkan harga --}}
                    <?php $price =  ($cart->tent->price ?? 0) + ($cart->shoe->price ?? 0) + ($cart->bag->price ?? 0) ?>
                    <td colspan="2">Total Harga</td>
                    <td>Rp.{{ number_format($price, 0, ",", ".") }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('cart.confirm') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="payment_method">Pilih Metode Pembayaran:</label>
                <select name="payment_method" id="payment_method" class="form-control">
                    <option value="Kredit">Kartu Kredit</option>
                    <option value="Bank_transfer">Transfer Bank</option>
                    <option value="COD">Bayar di Tempat</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Confirm Cart</button>
        </form>
    @else
        <h1>Anda belum punya keranjang</h1>
        <form action="{{ route('cart.create') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Buat Keranjang Baru</button>
        </form>
    @endif
</div>
@endsection
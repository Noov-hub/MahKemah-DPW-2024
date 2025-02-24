@extends('layouts\mainlayout')
@section('title', 'Details')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div style="height: 1000px;">

    <div class="row">
        <div class="col-lg-12 col-md-6 " style="margin-top:10px; margin-bottom:100px;">
            <div class="content-in-white">
                <div class="card-body" >
                    <h1 class="text-center">Detail Barang</h1>
                    <p class="text-center">berisi detail dan lain lain</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content-in-white">
            <div class="col-lg-12" style="margin:5px">
                <div class="member d-flex align-items-center">
                    <span class="border" style="margin:10px"> 
                        <div class="pic"><img src="{{ asset('img/sepatu/' . $shoe['image']) }}" class="card-img-top" alt="..."></div>
                    </span>
                    <div class="member-info">
                        <div class="card-body">
                            <h1 class="card-title">{{ $shoe['brand'] }}</h1>
                            <p>Harga Sewa: Rp.{{ number_format($shoe['price'], 0, ',', '.') }}</p>
                            <form action="{{ route('shoe_konfirmasi') }}" method="POST">
                                @csrf
                                <input type="hidden" name="shoe_id" value="{{ $shoe['id'] }}">
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Sewa langsung</button>
                            </form>
                            <form action="{{ route('add-to-cart-shoe') }}" method="POST">
                                @csrf
                                <input type="hidden" name="shoe_id" value="{{ $shoe['id'] }}">
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                <button type="submit" class="btn btn-secondary" style="margin:5px">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 1000px; width: 1000px"></div>
@endsection
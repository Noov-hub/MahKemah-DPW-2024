@extends('layouts.mainlayout')
@section('title', 'Admin-Page')

@section('content')
    @if(session('admin_password_verified'))
        <div class="container mt-5 content-in-white">
         
            <h1>Halaman Admin</h1>
            <div>
                <a href="/" class="btn btn-secondary" style="margin: 10px">Keluar</a>
            </div>
            <div class="content-in-white">
                <div class="card-body">
                    <h1 class="text-center">Barang yang sedang disewakan</h1>
                </div>
            </div>
            <div class="container-fluid">
                <div class="bg-white text-black rounded-pill p-3 text-center" style="margin: 50px">
                    <h1>TAS CARRIER</h1>
                </div>
                <div class="row">
                @foreach ($bags as $bag)
                    <div class="col-lg-3 col-md-6" style="margin-top:10px; margin-bottom:10px">
                        <div class="card">
                            <img src="{{ asset('img/tas/' . $bag['image']) }}" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $bag['brand'] }}</h5>
                                <p class="card-text">Harga Sewa : Rp.{{ number_format($bag['price'], 0, ",", ".") }}</p>
                                <form action="{{ route('change.status', $bag['id']) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="item_type" value="bag">
                                    <button type="submit" class="btn btn-secondary" style="margin: 5px;">Ganti status</button>
                                </form>
                                <a href="https://drive.google.com/drive/folders/1VWVsRz1TEUcKXr5dgJ24jDoceaAqxv_8?usp=sharing" class="btn btn-primary" style="margin: 5px;">Upload bukti pengembalian</a>
                                <a href="https://drive.google.com/drive/folders/1iGKsL9A6RB5gQw9PWNgQPTaWTrMuByTh?usp=sharing" class="btn btn-primary" style="margin: 5px;">Upload bukti penyerahan</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div style="height: 50px; width: 1000px"></div>
                <div class="bg-white text-black rounded-pill p-3 text-center" style="margin: 50px">
                    <h1>SEPATU GUNUNG</h1>
                </div>
                <div class="row">
                    @foreach ($shoes as $shoe)
                    <div class="col-lg-3 col-md-6" style="margin-top:10px; margin-bottom:10px">
                        <div class="card">
                            <img src="{{ asset('img/sepatu/' . $shoe['image']) }}" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $shoe['brand'] }}</h5>
                                <p class="card-text">Harga Sewa : Rp.{{ number_format($shoe['price'], 0, ",", ".") }}</p>
                                <form action="{{ route('change.status', $shoe['id']) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="item_type" value="shoe">
                                    <button type="submit" class="btn btn-secondary" style="margin: 5px;">Ganti status</button>
                                </form>
                                <a href="https://drive.google.com/drive/folders/1VWVsRz1TEUcKXr5dgJ24jDoceaAqxv_8?usp=sharing" class="btn btn-primary" style="margin: 5px;">Upload bukti pengembalian</a>
                                <a href="https://drive.google.com/drive/folders/1iGKsL9A6RB5gQw9PWNgQPTaWTrMuByTh?usp=sharing" class="btn btn-primary" style="margin: 5px;">Upload bukti penyerahan</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div style="height: 50px; width: 1000px"></div>
                <div class="bg-white text-black rounded-pill p-3 text-center" style="margin: 50px">
                    <h1>TENDA</h1>
                </div>
                <div class="row">
                    @foreach ($tents as $tent)
                    <div class="col-lg-3 col-md-6" style="margin-top:10px; margin-bottom:10px">
                        <div class="card">
                            <img src="{{ asset('img/tenda/' . $tent['image']) }}" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tent['brand'] }}</h5>
                                <p class="card-text">Harga Sewa : Rp.{{ number_format($tent['price'], 0, ",", ".") }}</p>
                                <form action="{{ route('change.status', $tent['id']) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="item_type" value="tent">
                                    <button type="submit" class="btn btn-secondary" style="margin: 5px;">Ganti status</button>
                                </form>
                                <a href="https://drive.google.com/drive/folders/1VWVsRz1TEUcKXr5dgJ24jDoceaAqxv_8?usp=sharing" class="btn btn-primary" style="margin: 5px;">Upload bukti pengembalian</a>
                                <a href="https://drive.google.com/drive/folders/1iGKsL9A6RB5gQw9PWNgQPTaWTrMuByTh?usp=sharing" class="btn btn-primary" style="margin: 5px;">Upload bukti penyerahan</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="container mt-5 content-in-white">
                <h2 class="text-center">10 Transaksi dengan Total Harga Tertinggi</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Waktu Transaksi</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topTransactions as $transaction)
                            <tr>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->updated_at->format('d-m-Y H:i:s') }}</td>
                                <td>Rp. {{ number_format($transaction->total_harga, 0, ",", ".") }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
         <!-- Transaksi dan laporan keuangan -->
            <div class="container mt-5 content-in-white">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-center">Transaksi</h2>
                    <h5 class="text-center">Total Pemasukan: Rp. {{ number_format($totalIncome, 0, ",", ".") }}</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Waktu Transaksi</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->updated_at->format('d-m-Y H:i:s') }}</td>
                                <td>Rp. {{ number_format($transaction->total_harga, 0, ",", ".") }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>
    @else
        <script>window.location = "/admin-verification";</script>
@endif
@endsection

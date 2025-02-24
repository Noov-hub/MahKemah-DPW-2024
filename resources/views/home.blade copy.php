@extends('layouts\mainlayout')
@section('title', 'Home')

@section('content')
<div class="container">

    {{-- <h1>halo wahai {{ $nama }} umur {{ $umur }}, anda adalah {{ $role }}</h1> --}}
    
    {{-- @for($i = 0; $i < 5; $i++)
        sekarang {{ $i }} <br>
    @endfor

    @foreach ($rolelain as $data)
        {{ $data }} <br>
        
    @endforeach --}}

    <table class="table">
        {{-- <tr>
            <th>No.</th>
            <th>role</th>
            <th></th>
        </tr>
        @foreach ($rolelain as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                {{ $data }}
            </td>
            <td>
                <button class="btn btn-secondary">Lihat</button>
                
            </td>
        </tr>
        
        @endforeach  --}}
    </table>
    <div>
        <h1>Selamat Datang di platform MahKemah Officials</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias quisquam esse dolore ex quia eligendi.
             Obcaecati eligendi deleniti saepe quam iusto unde nemo eaque repudiandae, autem consectetur quod dolor ab!</p>

    </div>
    <div class="container-fluid " >
        <h1>TAS CARRIER</h1>
        <div class="row">
            @foreach ($bags as $bag)
            <div class="col-lg-3 col-md-6" style="margin-top:5px; margin-bottom:5px">
                <div class="card">
                    <img src={{ asset('img/tas/' . $bag['image']) }} class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                    <div class="card-body" >
                        <p>{{ $bag['image']}}</p>
                        <h5 class="card-title">{{ $bag['brand'] }}</h5>
                        <p class="card-text">Harga Sewa :Rp.{{ $bag['price'] }}</p>
                        <a href="/details/{{ $bag['id'] }}" class="btn btn-secondary">detail</a>
                    </div>
                </div>
            </div>
            @endforeach
           
            <div class="col-lg-4" style="margin:5px">
                <div class="member d-flex align-items-center">
                    <span class="border"style="margin:10px"> 
                        <div class="pic"><img src="img/logo.jpg" class="card-img-top" alt="..."></div>
                    </span>
                  <div class="member-info">
                    {{-- <img src="logo.jpg" class="card-img-top" alt="..."> --}}
                    <div class="card-body" >
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-secondary">Go somewhere</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-4"style="margin:5px">
                <div class="member d-flex align-items-center">
                    <span class="border"style="margin:10px"> 
                        <div class="pic"><img src="img/logo.jpg" class="card-img-top" alt="..."></div>
                    </span>
                  <div class="member-info">
                    {{-- <img src="logo.jpg" class="card-img-top" alt="..."> --}}
                    <div class="card-body" >
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-secondary">Go somewhere</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-4"style="margin:5px">
                <div class="member d-flex align-items-center">
                    <span class="border"style="margin:10px"> 
                        <div class="pic"><img src="img/logo.jpg" class="card-img-top" alt="..."></div>
                    </span>
                  <div class="member-info">
                    {{-- <img src="logo.jpg" class="card-img-top" alt="..."> --}}
                    <div class="card-body" >
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-secondary">Go somewhere</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-4"style="margin:5px">
                <div class="member d-flex align-items-center">
                    <span class="border"style="margin:10px"> 
                        <div class="pic"><img src="img/logo.jpg" class="card-img-top" alt="..."></div>
                    </span>
                    
                  <div class="member-info">
                    {{-- <img src="logo.jpg" class="card-img-top" alt="..."> --}}
                    <div class="card-body" >
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-secondary">Go somewhere</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    
    
    {{-- @if ($role == 'admin')
    <a href="/admin">ke halaman admin</a>
    @else
    <a href="/warn">ke halaman admin</a>
    @endif --}}
</div>
@endsection
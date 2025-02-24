@extends('layouts\mainlayout')
@section('title', 'Home')

@section('content')
<div>
    <img src="" alt="">
</div>

        
<div class="content-in-white"  style="margin: 10px">
    <h1>Selamat Datang di platform MahKemah Officials</h1>
    <h5>Tempat sewa peralatan kemah terbaik yang anda dan kawan kawan anda dapat temukan!!</h5>
    
</div>

<div class="d-flex justify-content-center align-items-center centered-div" style="height: 1080px; margin-bottom:80px">
    <img src="/img/documentation.jpg" alt=""></img>
</div>



<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-6 " style="margin-top:10px; margin-bottom:50px;">
            <div class="content-in-white">
        
                <div class="card-body" >
    
                    <h1 class="text-center">Mengapa MahKemah?</h1>
                    <p class="text-center">Kenapa yaa??</p>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 " style="margin-top:10px; margin-bottom:10px;">
            <div class="content-in-white">
                <img src="/img/Coins.png" class="card-img-top" alt="...">
                <div class="card-body" >
                    <br> <br>
                    <h5 class="text-center">Harga Kompetitif</h5>
                    <p class="text-center">MahKemah menyediakan barang-barang pelengkap perkemahan dengan harga yang murah, namun memiliki kualitas yang tidak diragukan.</p>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 " style="margin-top:10px; margin-bottom:10px">
            <div class="content-in-white">
                <br><br>
                <img src="/img/tent.png" class="card-img-top" alt="...">
                <div class="card-body" >
                    <h5 class="text-center">Well Known</h5>
                    <p class="text-center">MahKemah sangat mendedikasikan diri kepada alat perkemahan sehingga kami sudah sangat dikenal oleh para pecinta kemah di dunia.</p>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 " style="margin-top:10px; margin-bottom:10px">
            <div class="content-in-white">
                <img src="/img/aproved.png" class="card-img-top" alt="...">
                <div class="card-body" >
                    <br> <br> <br>
                    <h5 class="text-center">Sudah Diakui</h5>
                    <p class="text-center">MahKemah tidak pernah mengecewakan pelanggannya, dan selalu memberikan yang terbaik. banyak orang yang telah mengakui MahKemah sebagai salah satu jasa penyewa perlengkapan terbaik</p>
                    
                </div>
            </div>
        </div>

    </div>

    
    <div style="height: 250px; width: 1000px">

    </div>
    <div class="content-in-white">
        
        <div class="card-body" >

            <h1 class="text-center">Langsung aja diliat-liat dulu boskuuu</h1>
            <p class="text-center">aseli min, barangnya bagus-bagus...</p>
            
        </div>
    </div>
    <div class="container-fluid " >
        <div class="bg-white text-black rounded-pill p-3 text-center" style="margin: 50px">
            <h1 >TAS CARRIER</h1>
        </div>
        <div class="row">
        @foreach ($bags as $bag)
        <div class="col-lg-3 col-md-6" style="margin-top:10px; margin-bottom:10px">
            <div class="card">
                <img src={{ asset('img/tas/' . $bag['image']) }} class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                <div class="card-body" >
                    <h5 class="card-title">{{ $bag['brand'] }}</h5>
                        <p class="card-text">Harga Sewa : Rp.{{ number_format( $bag['price'],0,",",".") }}</p>
                        <a href="{{ route('login') }}" class="btn btn-secondary">detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    
        </div>

        
        <div style="height: 250px; width: 1000px">

        </div>

        <div class="bg-white text-black rounded-pill p-3 text-center" style="margin: 50px">
            <h1 >SEPATU GUNUNG</h1>
        </div>
        <div class="row">
            @foreach ($shoes as $shoe)
            <div class="col-lg-3 col-md-6" style="margin-top:10px; margin-bottom:10px">
                <div class="card">
                    <img src={{ asset('img/sepatu/' . $shoe['image']) }} class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                    <div class="card-body" >
                        <h5 class="card-title">{{ $shoe['brand'] }}</h5>
                        <p class="card-text">Harga Sewa : Rp.{{ number_format( $shoe['price'],0,",",".") }}</p>
                        <a href="{{ route('login') }}" class="btn btn-secondary">detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    
        </div>

        <div style="height: 250px; width: 1000px">

        </div>

        <div class="bg-white text-black rounded-pill p-3 text-center" style="margin: 50px">
            <h1 >TENDA</h1>
        </div>
        <div class="row">
            @foreach ($tents as $tent)
            <div class="col-lg-3 col-md-6" style="margin-top:10px; margin-bottom:10px">
                <div class="card">
                    <img src={{ asset('img/tenda/' . $tent['image']) }} class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                    <div class="card-body" >
                        <h5 class="card-title">{{ $tent['brand'] }}</h5>
                        <p class="card-text">Harga Sewa : Rp.{{ number_format( $tent['price'],0,",",".") }}</p>
                        <a href="{{ route('login') }}" class="btn btn-secondary">detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    
        </div>
        
    </div>
    <div style="height: 500px; width: 1000px">

    </div>
    <div class="content-in-white">
        
        <div class="card-body" >

            <h1 class="text-center">Testimoni dari orang-orang terkenal</h1>
            <p class="text-center">klo ga kenal coba aja cari di google...</p>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6" style="margin-top:10px; margin-bottom:10px">
            <div class="card">
                <img src="img/ryangosling.png" class="card-img-top" alt="..." style="height: 500px; object-fit: cover;">
                <div class="card-body" >
                    <h5 class="card-title">Ryan Gosling</h5>
                    <p class="card-text">"Saya sangat suka kualitas dari peralatan yang disewakan oleh MahKemah Official, barang barang itu sangat legit"</p>
                    <a href="https://www.google.com/search?q=siapakah+Ryan+Gosling&newwindow=1&sca_esv=88d3c268484f9571&sxsrf=ADLYWIJVAWVdyI0Rwzc6uRzyWWTqsHMSJw%3A1717641150272&ei=vh9hZvSmEPqW4-EPoMaugAY&ved=0ahUKEwj0_fP098WGAxV6yzgGHSCjC2AQ4dUDCBA&uact=5&oq=siapakah+Ryan+Gosling&gs_lp=Egxnd3Mtd2l6LXNlcnAiFXNpYXBha2FoIFJ5YW4gR29zbGluZzIGEAAYFhgeMgYQABgWGB4yCBAAGIAEGKIEMggQABiABBiiBDIIEAAYgAQYogQyCBAAGIAEGKIESOghUPUHWIEdcAF4AZABAJgBb6ABvweqAQQxMS4xuAEDyAEA-AEBmAINoALbB8ICChAAGLADGNYEGEfCAgUQABiABMICBRAuGIAEwgIHEAAYgAQYCsICBRAhGKABwgIFECEYnwXCAgcQIRigARgKmAMAiAYBkAYIkgcEMTIuMaAHjDc&sclient=gws-wiz-serp" class="btn btn-secondary">siapa ni?</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" style="margin-top:10px; margin-bottom:10px">
            <div class="card">
                <img src="img/therock.png" class="card-img-top" alt="..." style="height: 500px; object-fit: cover;">
                <div class="card-body" >
                    <h5 class="card-title">Dwayne Johnson</h5>
                    <p class="card-text">"Saya sangat suka kualitas dari peralatan yang disewakan oleh MahKemah Official, barang barang itu sangat legit"</p>
                    <a href="https://www.google.com/search?q=siapakah+Dwayne+Johnson&newwindow=1&sca_esv=14e030f61bc09c7c&sxsrf=ADLYWIK7j3Fx-_Y7rMayJbaQMvRXb5nl1Q%3A1718036293953&ei=RSdnZuz1OYe-juMPufuVwAw&ved=0ahUKEwisrIz4t9GGAxUHn2MGHbl9BcgQ4dUDCBA&uact=5&oq=siapakah+Dwayne+Johnson&gs_lp=Egxnd3Mtd2l6LXNlcnAiF3NpYXBha2FoIER3YXluZSBKb2huc29uMgQQIxgnMggQABiABBiiBDIIEAAYgAQYogQyCBAAGIAEGKIESKNhUMoGWJAacAJ4AZABAJgB7gGgAZ0EqgEFNS4wLjG4AQPIAQD4AQGYAgigAqwEwgIKEAAYsAMY1gQYR8ICBxAjGLACGCeYAwCIBgGQBgiSBwU3LjAuMaAHjxc&sclient=gws-wiz-serp" class="btn btn-secondary">siapa ni?</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" style="margin-top:10px; margin-bottom:10px">
            <div class="card">
                <img src="img/guy.png" class="card-img-top" alt="..." style="height: 500px; object-fit: cover;">
                <div class="card-body" >
                    <h5 class="card-title">Ryan Reynolds</h5>
                    <p class="card-text">"Saya sangat suka kualitas dari peralatan yang disewakan oleh MahKemah Official, barang barang itu sangat legit"</p>
                    <a href="https://www.google.com/search?q=siapakah+Ryan+Reynolds&newwindow=1&sca_esv=14e030f61bc09c7c&sxsrf=ADLYWIIb7fisda1HiyLlda5YkaGTd2TE_A%3A1718036247522&ei=FydnZpq4H4Ob4-EP9daJyAo&ved=0ahUKEwjan_rht9GGAxWDzTgGHXVrAqkQ4dUDCBA&uact=5&oq=siapakah+Ryan+Reynolds&gs_lp=Egxnd3Mtd2l6LXNlcnAiFnNpYXBha2FoIFJ5YW4gUmV5bm9sZHMyBRAhGKABSOkTUNMGWNUIcAF4AZABAJgBWaABugKqAQE0uAEDyAEA-AEBmAIEoAL7AcICChAAGLADGNYEGEfCAgoQIRigARjDBBgKwgIIEAAYgAQYogSYAwCIBgGQBgiSBwE0oAfdCQ&sclient=gws-wiz-serp" class="btn btn-secondary">siapa ni?</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
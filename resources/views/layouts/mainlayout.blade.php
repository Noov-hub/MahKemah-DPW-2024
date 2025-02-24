<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MahKemah | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar-brand span {
            margin-left: 10px;
            margin-right: 10px;
        }
        .gradient-section {
            height: 300px; /* Anda bisa menyesuaikan tinggi sesuai kebutuhan */
            background: linear-gradient(45deg, #3B3B3B, #737373); /* Gradien dari warna oranye ke peach */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
        }
        .gradient-section-nav {
            height: 100px; /* Anda bisa menyesuaikan tinggi sesuai kebutuhan */
            background: linear-gradient(45deg, #3B3B3B, #737373); /* Gradien dari warna oranye ke peach */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
        }

        .body {
            background-image: url('{{ asset('img/background.jpg') }}');
            background-attachment: fixed;
            background-size: 1920px;
            background-position: center;
        }

        .content-in-white {
            background: rgba(255, 255, 255, 0.8); /* Warna putih dengan transparansi */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body class="body">
    <nav class="navbar navbar-expand-lg navbar-dark gradient-section-nav" style="background-color: #737373">
        <div class="container-fluid ">
            <a class="navbar-brand" href="/home" style="margin:10px">
                <img src="{{ asset('img/noov.png') }}" height="30" alt="">
                <span class="border"></span>
                <img src="{{ asset('img/weblogo.png') }}" height="30" alt="" >
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </div>
            </div>
            <div>
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a href="{{ url('/profile') }}" class="btn btn-light" style="margin:1px">Profile</a>
                            <a href="{{ route('cart.view') }}" class="btn btn-light" style="margin:1px">Cart</a>
                        @else
                            <a href="/admin" class="btn btn-light" style="margin:1px">Admin Page</a>
                            <a href="{{ route('login') }}" class="btn btn-light" style="margin:1px">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-light" style="margin:1px">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </nav>

    @yield('content')

    <div style="margin-top: 50px">
        <div class="gradient-section" style="padding: 100px">
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset('img/weblogo.png') }}" alt="">
                </div>
                <div class="col-lg-8">
                    <p>Selamat berpetualang dengan MahKemah! Kami mengundang Anda untuk menemukan kenyamanan di alam bebas dengan koleksi peralatan berkualitas 
                        tinggi yang siap mendukung setiap petualangan Anda. Dengan MahKemah, nikmati momen-momen tak terlupakan di tengah keindahan alam 
                        sambil merasa aman dan nyaman.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
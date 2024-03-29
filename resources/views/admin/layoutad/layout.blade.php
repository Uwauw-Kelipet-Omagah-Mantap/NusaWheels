<html>

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
    @yield('header')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('show-toast', ({
                type,
                message
            }) => {
                Swal.fire({
                    icon: type,
                    title: message,
                    showConfirmButton: false,
                    timer: 2000,
                });
            });
        });
    </script>
    <style>
        body {
            background-color: rgb(0, 149, 255);
        }

        .img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        .btn btn-danger {
            margin-right: 5;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <div class="container-fluid">
            <img src="{{ asset('logo.svg') }}" alt="logo">
            <a class="navbar-brand" href="#">NUSA WHEELS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pengguna.index') }}">Manajemen User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mobilad.index') }}">Manajemen Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('informasimobilad.index') }}">Manajemen Informasi Mobil
                            Penjual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manajemenpembayaranad.index') }}">Manajemen Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transaksipembayaranad.index') }}">Riwayat Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ulasanad.index') }}">Manajemen Ulasan</a>
                    </li>
                </ul>
                {{-- START LOGOUT --}}
                @if (Auth::check())
                    <div class="navbar-brand"
                        style="
            margin-right: 0px;>
                <a class="nav-link" href="#"
                        id="navbarDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img" src="{{ asset('brocklesnar.jpg') }}" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarDropdown2"style="margin-right: 5px">
                            <li><a class="dropdown-item" href="#">Option 1</a></li>
                            <hr style="
margin-top: 0px;
margin-bottom: 0px;
border: 1px solid rgba(0, 0, 0, 0.1);
">
                            <li><a class="dropdown-item" href="#">Option 2</a></li>
                            <hr style="
margin-top: 0px;
margin-bottom: 0px;
border: 1px solid rgba(0, 0, 0, 0.1);
">

                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                @endif
                {{-- END LOGOUT --}}
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    @include('sweetalert::alert')
</body>
<footer>
    @yield('footer')
</footer>

</html>

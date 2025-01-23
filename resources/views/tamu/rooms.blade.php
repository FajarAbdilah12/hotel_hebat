<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL HEBAT</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, #f9f9f9, #eaeaea);
        }

        .navbar {
            background: #333333;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #ffffff;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            margin-right: 15px;
            font-size: 1.1rem;
        }

        .navbar-nav .nav-link:hover {
            color: #d4af37;
            text-shadow: 0px 0px 8px rgba(255, 255, 255, 0.8);
        }

        .carousel-section {
            margin-top: 30px;
        }

        .carousel-item img {
            max-height: 450px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 15px;
            font-family: 'Arial', sans-serif;
        }

        .carousel-caption h5 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #d4af37;
        }

        .form-section {
            margin-top: 30px;
            background: linear-gradient(135deg, #ffffff, #f6f6f6);
            border-radius: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            padding: 40px;
        }

        .form-section h2 {
            color: #333333;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            font-size: 2rem;
        }

        .btn-primary {
            background: #555555;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            background: #444444;
        }

        .hotel-cards {
            display: flex;
            overflow-x: auto; /* Izinkan scroll horizontal */
            white-space: nowrap; /* Mencegah elemen membungkus */
            margin-top: 20px;
            padding: 10px 0; /* Tambahkan padding jika diperlukan */
        }

        .hotel-card {
            flex: 0 0 auto; /* Mengatur elemen agar tidak menyusut */
            width: 200px; /* Atur lebar kartu sesuai kebutuhan */
            margin-right: 20px; /* Jarak antar kartu */
            background: linear-gradient(135deg, #ffffff, #f7f7f7);
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .hotel-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0 .3);
        }

        .hotel-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 2px solid #d4af37;
        }

        .hotel-card .card-body {
            padding: 20px;
            text-align: center;
        }

        .hotel-card .card-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #555555;
        }

        .hotel-card .btn {
            background: #555555;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
        }

        .hotel-card .btn:hover {
            background: #444444;
        }

        footer {
            margin-top: 50px;
            text-align: center;
            padding: 20px;
            background: #333333;
            color: white;
            font-size: 1rem;
            border-radius: 10px;
        }

        /* Tambahkan margin-top untuk konten agar tidak tertutup navbar */
        .container {
            margin-top: 70px; /* Sesuaikan dengan tinggi navbar */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">HOTEL HEBAT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tamu.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kamar.index') }}">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fasilitas.index') }}">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        @if(Auth::check())
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline-light nav-link" style="margin-left: 15px; padding: 6px 20px; font-weight: bold;">Logout</button>
                            </form>
                        @else
                            <a class="btn btn-outline-light nav-link" href="{{ route('login') }}" style="margin-left: 15px; padding: 6px 20px; font-weight: bold;">Login</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="carousel-section">
            <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($kamars as $index => $kamar)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            @if($kamar->foto)
                                <img src="{{ asset('uploads/' . $kamar->foto) }}" class="d-block w-100" alt="{{ $kamar->tipe_kamar }}">
                            @else
                                <img src="{{ asset('uploads/placeholder.jpg') }}" class="d-block w-100" alt="Gambar tidak tersedia">
                            @endif
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $kamar->tipe_kamar }}</h5>
                                <p>{{ $kamar->deskripsi }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="hotel-cards">
                @foreach($kamars as $kamar)
                    <div class="hotel-card">
 <img src="{{ asset('uploads/' . ($kamar->foto ?? 'placeholder.jpg')) }}" alt="{{ $kamar->tipe_kamar }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $kamar->tipe_kamar }}</h5>
                            <p class="card-text">{{ Str::limit($kamar->deskripsi, 50) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-section">
            <h2>Form Pemesanan</h2>
            @if(Auth::check())
                <form id="reservationForm" action="{{ route('tamu.rooms.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="roomtype">Tipe Kamar</label>
                        <select class="form-select" id="roomtype" name="kamar_id" required>
                            @foreach($kamars as $kamar)
                                <option value="{{ $kamar->id }}">{{ $kamar->tipe_kamar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="nama_tamu">Nama Tamu</label>
                        <input class="form-control" id="nama_tamu" name="nama_tamu" type="text" placeholder="Masukkan nama lengkap Anda" required/>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label" for="checkin">Tanggal Cek In</label>
                            <input class="form-control" id="checkin" name="check_in" type="date" required/>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="checkout">Tanggal Cek Out</label>
                            <input class="form-control" id="checkout" name="check_out" type="date" required/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="jumlah_kamar">Jumlah Kamar</label>
                        <input class="form-control" id="jumlah_kamar" name="jumlah_kamar" type="number" min="1" placeholder="1" required/>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Konfirmasi Pemesanan</button>
                </form>
            @else
                <p>Anda harus <a href="{{ route('login') }}">login</a> untuk melakukan reservasi.</p>
            @endif
        </div>
    </div>

    <footer>
        <p>&copy; 2025 HOTEL HEBAT. All Rights Reserved.</p>
    </footer>

    <!-- Modal untuk login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login Diperlukan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda harus login untuk melakukan reservasi. Silakan login terlebih dahulu.
                </div>
                <div class="modal-footer">
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reservationForm = document.getElementById('reservationForm');
            const isLoggedIn = @json(Auth::check());

            reservationForm.addEventListener('submit', function(event) {
                if (!isLoggedIn) {
                    event.preventDefault(); // Mencegah form dari pengiriman
                    const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
                    loginModal.show(); // Tampilkan modal login
                }
            });
        });
    </script>
</body>
</html>
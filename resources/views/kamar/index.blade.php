<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kamar | HOTEL HEBAT</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            padding-top: 70px;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, #f9f9f9, #eaeaea);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
            padding: 20px;
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

        .hotel-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            justify-content: center;
        }

        .hotel-card {
            flex: 1 1 calc(33.333% - 20px);
            max-width: calc(33.333% - 20px);
            background: linear-gradient(135deg, #ffffff, #f7f7f7);
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .hotel-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
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
            text-align: center;
            padding: 20px;
            background: #333333;
            color: white;
            font-size: 1rem;
            border-radius: 10px 10px 0 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">HOTEL HEBAT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('tamu.rooms') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('kamar.index') }}">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('fasilitas.index') }}">Fasilitas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Daftar Kamar -->
    <div class="content">
        <div class="container">
            <h1 class="text-center my-4">Daftar Kamar</h1>
            <div class="hotel-cards">
                @foreach($kamar as $item)  <!-- Menggunakan $kamar yang sudah ada -->
                    <div class="hotel-card">
                        <img src="{{ asset('uploads/' . ($item->foto ?? 'placeholder.jpg')) }}" alt="{{ $item->tipe_kamar }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->tipe_kamar }}</h5>
                            <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                            <p class="text-muted">Harga: Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
                            <!-- Tombol Pesan Sekarang yang membuka modal -->
                            <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#bookingModal">Pesan Sekarang</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal Form Pemesanan -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Form Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tamu.rooms.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="roomtype">Tipe Kamar</label>
                            <select class="form-select" id="roomtype" name="kamar_id" required>
                                @foreach($kamar as $item)  <!-- Ganti $kamars menjadi $kamar -->
                                    <option value="{{ $item->id }}">{{ $item->tipe_kamar }}</option>
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
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 HOTEL HEBAT. All Rights Reserved.</p>
        <p>Designed with <i class="fas fa-heart" style="color: #d4af37;"></i> by Fajar Abdilah</p>
    </footer>

    <!-- JavaScript untuk Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

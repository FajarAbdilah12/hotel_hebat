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

        .about {
            margin-top: 40px;
            background: linear-gradient(135deg, #ffffff, #f6f6f6);
            border-radius: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            padding: 40px;
        }

        .about h2 {
            color: #333333;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            font-size: 2rem;
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tamu.rooms') }}">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href ="{{ route('fasilitas.index') }}">Fasilitas</a>
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
                            <img src="{{ asset('uploads/' . $kamar->foto) }}" class="d-block w-100" alt="{{ $kamar->tipe_kamar }}">
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
        </div>

        <div class="about">
            <h2 class="text-center">Tentang Kami</h2>
            <p>
                Lepaskan diri Anda ke Hotel Hebat, dikelilingi oleh keindahan pegunungan yang indah, danau, dan sawah menghijau. Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam yang memukau; Kid's Club yang luas - menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga. Convention Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di Bandung, mampu mengakomodasi hingga 3.000 delegasi. Manfaatkan ruang penyelenggaraan konvensi M.I.C.E ataupun mewujudkan acara pernikahan adat yang mewah.
            </p>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 HOTEL HEBAT. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> ⬤
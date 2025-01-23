<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Fasilitas | HOTEL HEBAT</title>
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

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3436;
        }

        .card-text {
            font-size: 1rem;
            color: #636e72;
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
                        <a class="nav-link" href="{{ route('tamu.rooms') }}">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fasilitas.index') }}">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        @if(Auth::check())
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline -light nav-link" style="margin-left: 15px; padding: 6px 20px; font-weight: bold;">Logout</button>
                            </form>
                        @else
                            <a class="btn btn-outline-light nav-link" href="{{ route('login') }}" style="margin-left: 15px; padding: 6px 20px; font-weight: bold;">Login</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($fasilitas as $item)
                <div class="col">
                    <div class="card">
                        <img 
                            src="{{ asset('storage/' . ($item->foto ?? 'placeholder.jpg')) }}" 
                            alt="{{ $item->nama_fasilitas }}" 
                            class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_fasilitas }}</h5>
                            <p class="card-text">{{ $item->deskripsi ?? 'Deskripsi tidak tersedia.' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer>
        <p>&copy; 2025 HOTEL HEBAT. All Rights Reserved.</p>
    </footer>

    <script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ptWZ5tdHVbkZ3wjzKG3tuWjPuaerYobCUrEFpqxG1+dqTP3TyOcHxTZHi+jzslHE"></script>
</body>
</html> 
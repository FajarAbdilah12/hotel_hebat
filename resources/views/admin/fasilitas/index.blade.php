<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Fasilitas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 30px;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table td {
            background-color: #ffffff;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            border-radius: 5px;
        }

        .alert {
            margin-top: 20px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .facility-image {
            max-width: 80px;
            max-height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">HOTEL HEBAT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.kamar.index') }}">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.fasilitas.index') }}">Fasilitas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Manajemen Fasilitas</h1>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tombol Tambah Fasilitas -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary mb-3">Tambah Fasilitas</a>
                </div>

                <!-- Tabel Daftar Fasilitas -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nama Fasilitas</th>
                                        <th>Deskripsi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($facilities as $facility)
                                        <tr>
                                            <td>
                                                @if($facility->foto)
                                                    <img src="{{ asset('storage/' . $facility->foto) }}" alt="Foto Fasilitas" class="facility-image">
                                                @else
                                                    <span class="text-muted">Tidak Ada Foto</span>
                                                @endif
                                            </td>
                                            <td>{{ $facility->nama_fasilitas }}</td>
                                            <td>{{ $facility->deskripsi }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.fasilitas.edit', $facility->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                
                                                <form action="{{ route('admin.fasilitas.destroy', $facility->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?');">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

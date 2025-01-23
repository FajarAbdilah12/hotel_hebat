<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kamar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
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

        .form-group input {
            border-radius: 5px;
        }

        .form-group label {
            font-weight: bold;
        }

        .card {
            margin-bottom: 30px;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table {
            border-radius: 10px;
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

        .image-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .form-row .form-group {
            margin-bottom: 20px;
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
                          <a class="nav-link" href="{{ route('kamar.index') }}">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.fasilitas.index') }}">Fasilitas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="text-center">Manajemen Kamar</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form untuk Menambah Kamar -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Kamar</h4>
                <form action="{{ route('admin.kamar.index') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tipe_kamar">Tipe Kamar</label>
                            <input type="text" class="form-control" name="tipe_kamar" placeholder="Tipe Kamar" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" placeholder="Harga" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" name="foto" accept="image/*">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kamar</button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Kamar -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Kamar</h4>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Tipe Kamar</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{ $room->tipe_kamar }}</td>
                                <td>{{ $room->deskripsi }}</td>
                                <td>{{ $room->harga }}</td>
                                <td>
                                    @if($room->foto)
                                        <img src="{{ asset('uploads/'.$room->foto) }}" alt="Foto Saat Ini" class="image-preview">
                                    @else
                                        <span>Foto Tidak Tersedia</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Update Form -->
                                    <form action="{{ route('admin.kamar.update', $room->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="tipe_kamar" value="{{ $room->tipe_kamar }}" required>
                                        <input type="text" name="deskripsi" value="{{ $room->deskripsi }}">
                                        <input type="number" name="harga" value="{{ $room->harga }}" required>
                                        <button type="submit" class="btn btn-warning btn-sm">Perbarui</button>
                                    </form>

                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.kamar.destroy', $room->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kamar ini?');">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

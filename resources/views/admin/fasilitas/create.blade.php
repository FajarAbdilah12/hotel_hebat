<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Fasilitas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="text-center">Tambah Fasilitas</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                                <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" placeholder="Nama Fasilitas" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi">
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Tambah Fasilitas</button>
                            </div>
                        </form>

                        @if ($errors->any())
                            <div class="mt-3">
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

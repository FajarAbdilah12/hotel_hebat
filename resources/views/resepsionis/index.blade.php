<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Reservasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 80px;
        }

        .container {
            max-width: 1000px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .input-group input {
            border-radius: 5px;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table {
            margin-top: 30px;
        }

        .alert {
            margin-top: 20px;
            font-size: 1.1rem;
        }

        .card {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Reservasi</h1>

        <!-- Form Filtering -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filter Berdasarkan Tanggal</h4>
                <form action="{{ route('resepsionis.filter') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="check_in" class="form-label">Tanggal Check-in</label>
                            <input type="date" name="check_in" class="form-control" required>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Form Pencarian -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cari Berdasarkan Nama Tamu</h4>
                <form action="{{ route('resepsionis.search') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="nama_tamu" class="form-control" placeholder="Cari berdasarkan nama tamu" required>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Reservasi -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Reservasi</h4>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Tamu</th>
                            <th>Tipe Kamar</th>
                            <th>Tanggal Check-in</th>
                            <th>Tanggal Check-out</th>
                            <th>Jumlah Kamar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservasi as $res)
                            <tr>
                                <td>{{ $res->nama_tamu }}</td>
                                <td>{{ $res->kamar->tipe_kamar }}</td>
                                <td>{{ $res->check_in }}</td>
                                <td>{{ $res->check_out }}</td>
                                <td>{{ $res->jumlah_kamar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($reservasi->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        Tidak ada data reservasi yang ditemukan.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

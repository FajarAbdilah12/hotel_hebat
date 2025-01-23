<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Reservasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .card-text {
            font-size: 1.1rem;
            color: #555;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .container {
            margin-top: 50px;
            max-width: 800px;
        }

        @media print {
            body {
                background-color: white;
                font-size: 1rem;
            }

            .container {
                margin: 0;
                padding: 0;
                width: 100%;
            }

            .card {
                box-shadow: none;
                border: none;
                border-radius: 0;
                margin-bottom: 0;
            }

            .btn-primary {
                display: none;
            }

            .card-body {
                padding: 1.5rem;
            }

            .card-title {
                font-size: 1.5rem;
            }

            .card-text {
                font-size: 1rem;
            }

            h1 {
                font-size: 2.5rem;
                margin-bottom: 30px;
                color: #007bff;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Bukti Reservasi</h1>
        <div class="card mx-auto" style="max-width: 800px;">
            <div class="card-body">
                <h5 class="card-title text-center">Detail Reservasi</h5>
                <p><strong>Nama Tamu:</strong> {{ $reservation->nama_tamu }}</p>
                <p><strong>Tipe Kamar:</strong> {{ $reservation->kamar->tipe_kamar }}</p>
                <p><strong>Tanggal Check-in:</strong> {{ $reservation->check_in }}</p>
                <p><strong>Tanggal Check-out:</strong> {{ $reservation->check_out }}</p>
                <p><strong>Jumlah Kamar:</strong> {{ $reservation->jumlah_kamar }}</p>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-primary" onclick="window.print()">Print Bukti Reservasi</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

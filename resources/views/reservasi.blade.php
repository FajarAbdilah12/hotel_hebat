<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Reservasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        .details {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Bukti Reservasi</h1>
    <div class="details">
        <p><strong>Nama Tamu:</strong> {{ $reservasi->nama_tamu }}</p>
        <p><strong>Tipe Kamar:</strong> {{ $reservasi->kamar->tipe_kamar }}</p>
        <p><strong>Tanggal Check-In:</strong> {{ $reservasi->tanggal_check_in }}</p>
        <p><strong>Jumlah Kamar:</strong> {{ $reservasi->jumlah_kamar }}</p>
    </div>
    <button onclick="window.print()">Cetak Bukti</button>
</body>
</html>
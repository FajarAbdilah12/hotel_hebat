<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kamar</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Kamar</h1>
        <div class="row">
            @foreach($kamar as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if($item->foto)
                            <img src="{{ asset('uploads/' . $item->foto) }}" class="card-img-top" alt="{{ $item->tipe_kamar }}">
                        @else
                            <img src="{{ asset('uploads/placeholder.jpg') }}" class="card-img-top" alt="Gambar tidak tersedia">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->tipe_kamar }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p class="text-muted">Harga: Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>

<!-- filepath: /C:/xampp/htdocs/projek_hotel/resources/views/admin/kamar/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamar</title>
</head>
<body>
    <h1>Tambah Kamar</h1>
    <form action="{{ route('admin.kamar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="tipe_kamar" placeholder="Tipe Kamar" required>
        <input type="text" name="deskripsi" placeholder="Deskripsi">
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="file" name="foto" accept="image/*">
        <button type="submit">Tambah Kamar</button>
    </form>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
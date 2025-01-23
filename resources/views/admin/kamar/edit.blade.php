<!-- resources/views/admin/rooms/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamar</title>
</head>
<body>
    <h1>Edit Kamar</h1>
    <form action="{{ route('admin.kamar.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="tipe_kamar" value="{{ $room->tipe_kamar }}" required>
        <input type="text" name="deskripsi" value="{{ $room->deskripsi }}">
        <input type="number" name="harga" value="{{ $room->harga }}" required>
        <button type="submit">Perbarui Kamar</button>
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
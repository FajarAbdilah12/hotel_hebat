<!-- resources/views/admin/facilities.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Fasilitas</title>
</head>
<body>
    <h1>Manajemen Fasilitas</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.facilities') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama Fasilitas" required>
        <input type="text" name="description" placeholder="Deskripsi">
        <button type="submit">Tambah Fasilitas</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Nama Fasilitas</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
                <tr>
                    <td>{{ $facility->name }}</td>
                    <td>{{ $facility->description }}</td>
                    <td>
                        <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" value="{{ $facility->name }}" required>
                            <input type="text" name="description" value="{{ $facility->description }}">
                            <button type="submit">Perbarui</button>
                        </form>
                        <form action="{{ route('admin.facilities.destroy', $facility->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
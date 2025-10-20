<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <p>Berikut adalah daftar buku yang tersedia:</p>

    @foreach ($books as $book)
        <ul>
            <li><strong>Judul:</strong> {{ $book->title }}</li>
            <li><strong>Deskripsi:</strong> {{ $book->description }}</li>
            <li><strong>Harga:</strong> Rp{{ number_format($book->price, 0, ',', '.') }}</li>
            <li><strong>Stok:</strong> {{ $book->stock }}</li>
            <li><strong>Genre:</strong> {{ $book->genre->name ?? '-' }}</li>
        </ul>
    @endforeach

</body>
</html>
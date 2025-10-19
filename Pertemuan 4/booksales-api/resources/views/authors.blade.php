<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Author</title>
</head>
<body>
    <h1>Daftar Penulis</h1>
    <p>Berikut adalah daftar penulis yang tersedia:</p>

    @foreach ($authors as $author)
        <ul>
            <li><strong>Nama:</strong> {{ $author->name }}</li>
            <li><strong>Biografi:</strong> {{ $author->bio }}</li>
        </ul>
    @endforeach
</body>
</html>

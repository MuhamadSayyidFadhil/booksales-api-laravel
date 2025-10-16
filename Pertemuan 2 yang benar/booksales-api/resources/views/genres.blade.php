<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Genre</title>
</head>
<body>
    <h1>Daftar Genre Buku</h1>
    <p>Berikut adalah daftar genre yang tersedia:</p>

    @foreach ($genres as $item)
        <ul>
            <li><strong>{{ $item['name'] }}</strong></li>
            <li>{{ $item['description'] }}</li>
        </ul>
    @endforeach
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Author</title>
</head>
<body>
    <h1>Daftar Penulis Buku</h1>
    <p>Berikut adalah daftar author yang tersedia:</p>

    @foreach ($authors as $item)
        <ul>
            <li><strong>{{ $item['name'] }}</strong></li>
            <li>{{ $item['bio'] }}</li>
            <li>{{ $item['country'] }}</li>
        </ul>
    @endforeach
</body>
</html>

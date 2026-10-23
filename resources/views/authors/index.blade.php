<!DOCTYPE html>
<html>
<head>
    <title>Daftar Author</title>
</head>
<body>
    <h1>Daftar Author</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Author</th>
            <th>Email</th>
        </tr>
        @foreach ($authors as $author)
        <tr>
            <td>{{ $author['id'] }}</td>
            <td>{{ $author['name'] }}</td>
            <td>{{ $author['email'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
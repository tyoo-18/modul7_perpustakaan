<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>🛠️ Dashboard Administrator</h2>
        <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>

        <div style="margin: 20px 0;">
            <a href="{{ route('admin.users.index') }}" class="btn">👥 Kelola Pengguna & Role</a>
            <a href="{{ route('buku.index') }}" class="btn" style="background:#28a745;">📚 Kelola Data Buku</a>
        </div>

        <!-- Contoh yang benar -->
        <form action="{{ route('custom.logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>

</html>
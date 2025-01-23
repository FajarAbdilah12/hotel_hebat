<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HOTEL HEBAT</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            background: linear-gradient(135deg, #f0f0f0, #d4af37);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .login-container h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333333;
            text-align: center;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #d4af37;
        }
        .btn-primary {
            background: #333333;
            border: none;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
            background: #555555;
        }
        .form-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
        }
        .form-footer a {
            color: #d4af37;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-footer">
            <p>Belum punya akun? <a href="{{ url('/register') }}">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>

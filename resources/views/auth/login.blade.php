<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CDN biar nggak nyiksa mata -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
            width: 360px;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .login-card button {
            width: 100%;
        }

        .bottom-text {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="login-card">

    <h2>Login</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary" type="submit">Login</button>

        <p class="bottom-text">
            Belum punya akun?
            <a href="{{ route('register') }}">Register</a>
        </p>
    </form>
</div>

</body>
</html>

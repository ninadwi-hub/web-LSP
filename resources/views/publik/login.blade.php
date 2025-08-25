<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LSP Trainer Kompeten Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2196f3, #00bcd4);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            width: 400px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            padding: 30px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-height: 70px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center">
            <img src="{{ asset('THEMES/Medicio/assets/img/logo_lsp.png') }}" alt="LSP TKI" class="logo">
            <h5 class="mt-2">LSP Trainer Kompeten Indonesia</h5>
        </div>

        {{-- Form Login --}}
      <form method="POST" action="{{ route('publik.login.post') }}">
            @csrf
            <div class="mt-4">
                <label for="email" class="form-label">Username / Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="email" name="email" id="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" id="password" 
                           class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>
                <a href="{{ route('publik.register') }}">Don't have an account?</a>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>

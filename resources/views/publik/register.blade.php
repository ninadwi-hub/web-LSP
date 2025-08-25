<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LSP Trainer Kompeten Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2196f3, #00bcd4);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-card {
            width: 450px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            padding: 30px;
        }
        .logo {
            display: block;
            margin: 0 auto 15px;
            max-height: 70px;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="text-center">
            <img src="{{ asset('THEMES/Medicio/assets/img/logo_lsp.png') }}" alt="LSP TKI" class="logo">
            <h5 class="mt-2">LSP Trainer Kompeten Indonesia</h5>
            <p class="text-muted">Pendaftaran Akun</p>
        </div>

        <form method="POST" action="{{ route('publik.register') }}">
            @csrf

            {{-- Pilih Role --}}
            <div class="mb-3">
                <label class="form-label d-block">Daftar Sebagai</label>
                <div class="form-check form-check-inline">
                    <input type="radio" name="role" id="role_asesi" value="asesi" class="form-check-input" checked>
                    <label for="role_asesi" class="form-check-label">Asesi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="role" id="role_tuk" value="tuk" class="form-check-input">
                    <label for="role_tuk" class="form-check-label">TUK</label>
                </div>
            </div>

            {{-- Nama Lengkap --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            </div>

            {{-- No HP --}}
            <div class="mb-3">
                <label for="phone" class="form-label">No. HP</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-phone"></i></span>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('publik.login') }}">Sudah Daftar? Login</a>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success">Kirim</button>
            </div>
        </form>
    </div>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>

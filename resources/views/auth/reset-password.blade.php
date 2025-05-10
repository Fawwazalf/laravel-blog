<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h4>Reset Password</h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="mb-3">
                                
                <label>Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $request->email ?? old('email') }}"
                                    required autocomplete="email" autofocus placeholder="Masukkan Alamat Email">
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Password Baru</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password"
                                    placeholder="Masukkan Password Baru">
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Masukkan Konfirmasi Password Baru">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-3 text-muted">
                    <a href="{{ route('login') }}">Kembali ke Login</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>

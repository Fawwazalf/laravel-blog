<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .reset-container {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }
        
        .reset-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .reset-logo {
            width: 80px;
            height: 80px;
            background-color: #0d6efd;
            color: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(13, 110, 253, 0.2);
        }
        
        .reset-title {
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            color: #212529;
        }
        
        .reset-subtitle {
            color: #6c757d;
            font-size: 1rem;
            margin-bottom: 0;
        }
        
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid #f1f1f1;
            padding: 1.5rem;
        }
        
        .card-header h4 {
            margin-bottom: 0;
            font-weight: 600;
            color: #212529;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #495057;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            font-size: 1rem;
            background-color: #f8f9fa;
            transition: all 0.2s;
        }
        
        .form-control:focus {
            border-color: #0d6efd;
            background-color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        .input-group-text {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }
        
        .btn {
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        
        .btn-primary:hover {
            background-color: #0a58ca;
            border-color: #0a58ca;
        }
        
        .alert {
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border: none;
        }
        
        .alert-success {
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            font-size: 0.9rem;
            padding: 0.5rem 0.75rem;
            margin-top: 0.5rem !important;
        }
        
        .back-to-login {
            display: inline-flex;
            align-items: center;
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .back-to-login:hover {
            color: #0a58ca;
            text-decoration: underline;
        }
        
        .back-to-login i {
            margin-right: 0.5rem;
        }
        
        .input-group-password {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            padding: 0.25rem;
        }
        
        .password-toggle:hover {
            color: #212529;
        }
        
        .password-requirements {
            background-color: rgba(13, 110, 253, 0.1);
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
            color: #495057;
            font-size: 0.9rem;
        }
        
        .password-requirements ul {
            margin-bottom: 0;
            padding-left: 1.5rem;
        }
        
        .password-requirements li {
            margin-bottom: 0.25rem;
        }
        
        .password-requirements li:last-child {
            margin-bottom: 0;
        }
        
        @media (max-width: 576px) {
            .reset-container {
                padding: 1.5rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <div class="reset-header">
            <div class="reset-logo">
                <i class="bi bi-shield-lock"></i>
            </div>
            <h1 class="reset-title">Reset Password</h1>
            <p class="reset-subtitle">Create a new secure password for your account</p>
        </div>
        
        <div class="card shadow-lg">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $request->email ?? old('email') }}"
                                required autocomplete="email" autofocus 
                                placeholder="Enter your email address">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <div class="input-group input-group-password">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password"
                                placeholder="Enter your new password">
                            <button type="button" class="password-toggle" id="password-toggle">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="password-confirm" class="form-label">Confirm Password</label>
                        <div class="input-group input-group-password">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill"></i>
                            </span>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm your new password">
                            <button type="button" class="password-toggle" id="confirm-toggle">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="password-requirements">
                        <div class="fw-medium mb-2">Password must contain:</div>
                        <ul>
                            <li>At least 8 characters</li>
                            <li>At least one uppercase letter</li>
                            <li>At least one lowercase letter</li>
                            <li>At least one number</li>
                            <li>At least one special character</li>
                        </ul>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i> Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="back-to-login">
                <i class="bi bi-arrow-left"></i> Back to Login
            </a>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password visibility toggle for new password
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('password-toggle');
            const passwordToggleIcon = passwordToggle.querySelector('i');
            
            passwordToggle.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    passwordToggleIcon.classList.remove('bi-eye');
                    passwordToggleIcon.classList.add('bi-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    passwordToggleIcon.classList.remove('bi-eye-slash');
                    passwordToggleIcon.classList.add('bi-eye');
                }
            });
            
            // Password visibility toggle for confirm password
            const confirmInput = document.getElementById('password-confirm');
            const confirmToggle = document.getElementById('confirm-toggle');
            const confirmToggleIcon = confirmToggle.querySelector('i');
            
            confirmToggle.addEventListener('click', function() {
                if (confirmInput.type === 'password') {
                    confirmInput.type = 'text';
                    confirmToggleIcon.classList.remove('bi-eye');
                    confirmToggleIcon.classList.add('bi-eye-slash');
                } else {
                    confirmInput.type = 'password';
                    confirmToggleIcon.classList.remove('bi-eye-slash');
                    confirmToggleIcon.classList.add('bi-eye');
                }
            });
        });
    </script>
</body>
</html>
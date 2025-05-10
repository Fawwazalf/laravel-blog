<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Blog System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        
        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 2rem;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-logo {
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
        
        .login-title {
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            color: #212529;
        }
        
        .login-subtitle {
            color: #6c757d;
            font-size: 1rem;
            margin-bottom: 0;
        }
        
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            overflow: hidden;
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
        
        .form-floating > .form-control {
            padding-top: 1.625rem;
            padding-bottom: 0.625rem;
            height: calc(3.5rem + 2px);
        }
        
        .form-floating > label {
            padding: 1rem 0.75rem;
        }
        
        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
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
        
        .btn-outline-secondary {
            color: #6c757d;
            border-color: #ced4da;
        }
        
        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
            color: #212529;
            border-color: #ced4da;
        }
        
        .forgot-password {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s;
        }
        
        .forgot-password:hover {
            color: #0a58ca;
            text-decoration: underline;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #dee2e6;
        }
        
        .divider::before {
            margin-right: 1rem;
        }
        
        .divider::after {
            margin-left: 1rem;
        }
        
        .social-login {
            display: flex;
            gap: 1rem;
        }
        
        .social-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem;
            border-radius: 8px;
            background-color: #fff;
            border: 1px solid #ced4da;
            color: #212529;
            font-weight: 500;
            transition: all 0.2s;
            text-decoration: none;
        }
        
        .social-btn:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .social-btn i {
            font-size: 1.25rem;
        }
        
        .social-btn.github {
            background-color: #24292e;
            color: white;
            border-color: #24292e;
        }
        
        .social-btn.github:hover {
            background-color: #1b1f23;
        }
        
        .social-btn.google {
            background-color: white;
            color: #212529;
            border-color: #ced4da;
        }
        
        .social-btn.google:hover {
            background-color: #f8f9fa;
        }
        
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        .register-link a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .register-link a:hover {
            color: #0a58ca;
            text-decoration: underline;
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
        
        .form-floating .password-toggle {
            top: calc(50% + 0.25rem);
        }
        
        .alert {
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border: none;
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        
        .alert-success {
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
        }
        
        @media (max-width: 576px) {
            .login-container {
                padding: 1.5rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .social-login {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="login-logo">
                <i class="bi bi-journal-text"></i>
            </div>
            <h1 class="login-title">Welcome Back</h1>
            <p class="login-subtitle">Sign in to continue to your account</p>
        </div>
        
        <div class="alert alert-danger d-none" id="error-alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            <span id="error-message">Invalid email or password. Please try again.</span>
        </div>
        
        <div class="alert alert-success d-none" id="success-alert">
            <i class="bi bi-check-circle me-2"></i>
            <span id="success-message">You have been logged out successfully.</span>
        </div>
        
        <div class="card">
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="password" class="form-label mb-0">Password</label>
                            <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                        </div>
                        <div class="input-group input-group-password">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            <button type="button" class="password-toggle" id="password-toggle">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Sign In
                        </button>
                    </div>
                </form>
                
                <div class="divider">or continue with</div>
                
                <div class="social-login">
                    <a href="{{ route('login.provider', ['provider' => 'github'])}}" class="social-btn github">
                        <i class="bi bi-github"></i>
                        <span>GitHub</span>
                    </a>
                    <a href="{{ route('login.provider', ['provider' => 'google']) }}" class="social-btn google">
                        <i class="bi bi-google"></i>
                        <span>Google</span>
                    </a>
                </div>
                
                <div class="register-link">
                    Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                </div>
            </div>
        </div>
    </div>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password visibility toggle
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
            
            // Show success message if redirected with success
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                const successAlert = document.getElementById('success-alert');
                const successMessage = document.getElementById('success-message');
                
                const message = urlParams.get('message');
                if (message) {
                    successMessage.textContent = message;
                }
                
                successAlert.classList.remove('d-none');
                
                // Auto hide after 5 seconds
                setTimeout(() => {
                    successAlert.classList.add('d-none');
                }, 5000);
            }
            
            // Show error message if redirected with error
            if (urlParams.has('error')) {
                const errorAlert = document.getElementById('error-alert');
                const errorMessage = document.getElementById('error-message');
                
                const message = urlParams.get('message');
                if (message) {
                    errorMessage.textContent = message;
                }
                
                errorAlert.classList.remove('d-none');
                
                // Auto hide after 5 seconds
                setTimeout(() => {
                    errorAlert.classList.add('d-none');
                }, 5000);
            }
        });
    </script>
</body>
</html>
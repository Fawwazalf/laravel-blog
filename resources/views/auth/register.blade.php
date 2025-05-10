<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
        
        .register-container {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .register-logo {
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
        
        .register-title {
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            color: #212529;
        }
        
        .register-subtitle {
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
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            font-size: 0.9rem;
        }
        
        .login-link {
            display: inline-flex;
            align-items: center;
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .login-link:hover {
            color: #0a58ca;
            text-decoration: underline;
        }
        
        .login-link i {
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
        
        .social-login {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
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
        
        .password-requirements {
            background-color: rgba(13, 110, 253, 0.1);
            border-radius: 8px;
            padding: 1rem;
            margin-top: 0.5rem;
            margin-bottom: 1.5rem;
            color: #495057;
            font-size: 0.85rem;
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
            .register-container {
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
    <div class="register-container">
        <div class="register-header">
            <div class="register-logo">
                <i class="bi bi-person-plus"></i>
            </div>
            <h1 class="register-title">Create Account</h1>
            <p class="register-subtitle">Join our community today</p>
        </div>
        
        <div class="card shadow-lg">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter your full name" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email address" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group input-group-password">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Create a strong password" required>
                            <button type="button" class="password-toggle" id="password-toggle">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        
                        <div class="password-requirements">
                            <div class="fw-medium mb-2">Password must contain:</div>
                            <ul>
                                <li>At least 8 characters</li>
                            
                            </ul>
                        </div>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-person-plus me-2"></i> Create Account
                        </button>
                    </div>
                </form>
                
                <div class="divider">or register with</div>
                
                <div class="social-login">
                    <a href="{{ route('login.provider', ['provider'=>'github']) }}" class="social-btn github">
                        <i class="bi bi-github"></i>
                        <span>GitHub</span>
                    </a>
                    <a href="{{ route('login.provider', ['provider'=>'google']) }}" class="social-btn google">
                        <i class="bi bi-google"></i>
                        <span>Google</span>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <p class="text-muted">
                Already have an account? 
                <a href="{{ route('login') }}" class="login-link">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
            </p>
        </div>
    </div>
    
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
        });
    </script>
</body>
</html>
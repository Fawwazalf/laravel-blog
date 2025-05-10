<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            padding-top: 76px; /* Added to account for fixed navbar */
        }
        
        /* Navbar Styles */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 0.75rem 1rem;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: #212529;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .navbar-brand-icon {
            width: 36px;
            height: 36px;
            background-color: #0d6efd;
            color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        
        .navbar .nav-link {
            color: #495057;
            font-weight: 500
            padding: 0.5rem 1rem;
            transition: all 0.2s;
        }
        
        .navbar .nav-link:hover, 
        .navbar .nav-link.active {
            color: #0d6efd;
        }
        
        .navbar .nav-link.active {
            position: relative;
        }
        
        .navbar .nav-link.active:after {
            content: '';
            position: absolute;
            bottom: -0.75rem;
            left: 1rem;
            right: 1rem;
            height: 3px;
            background-color: #0d6efd;
            border-radius: 3px 3px 0 0;
        }
        
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .btn-login {
            background-color: #0d6efd;
            color: white;
            border-radius: 8px;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-login:hover {
            background-color: #0a58ca;
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-login i {
            margin-right: 0.5rem;
        }
        
        .profile-dropdown .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.2s;
            text-decoration: none;
        }
        
        .profile-dropdown .dropdown-toggle:hover,
        .profile-dropdown .dropdown-toggle:focus {
            background-color: #f8f9fa;
        }
        
        .profile-dropdown .dropdown-toggle::after {
            display: none;
        }
        
        .profile-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #495057;
            font-size: 1rem;
        }
        
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        
        .profile-info {
            display: flex;
            flex-direction: column;
        }
        
        .profile-name {
            font-weight: 600;
            color: #212529;
            font-size: 0.9rem;
            line-height: 1.2;
        }
        
        .profile-email {
            color: #6c757d;
            font-size: 0.8rem;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 0.5rem;
            min-width: 200px;
        }
        
        .dropdown-item {
            padding: 0.6rem 1rem;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.2s;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
        
        .dropdown-item i {
            font-size: 1.1rem;
            color: #6c757d;
            width: 20px;
            text-align: center;
        }
        
        .dropdown-divider {
            margin: 0.5rem 0;
            border-color: #f1f1f1;
        }
        
        .dropdown-item-danger {
            color: #dc3545;
        }
        
        .dropdown-item-danger i {
            color: #dc3545;
        }
        
        .dropdown-item-danger:hover {
            background-color: rgba(220, 53, 69, 0.1);
        }
        
        /* Original Blog Styles */
        .blog-title {
            font-weight: 700;
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        .blog-title:after {
            content: '';
            position: absolute;
            width: 70px;
            height: 4px;
            background-color: #0d6efd;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        .card {
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 12px;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
        }
        .card-title {
            font-weight: 600;
            color: #212529;
        }
        .card-text {
            color: #6c757d;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .author-badge {
            background-color: #e9ecef;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .date-badge {
            color: #6c757d;
            font-size: 0.85rem;
        }
        .read-more {
            color: #0d6efd;
            font-weight: 500;
            text-decoration: none;
        }
        .read-more:hover {
            text-decoration: underline;
        }
        .empty-state {
            padding: 60px 0;
            text-align: center;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .empty-icon {
            font-size: 3rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }
        
        /* Carousel adjustments */
        .carousel {
            height: 220px;
            overflow: hidden;
        }
        
        .carousel-item img {
            height: 220px;
            object-fit: cover;
        }
        
        .carousel-indicators {
            margin-bottom: 0.5rem;
        }
        
        .carousel-indicators button {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
        }
        
        .carousel-indicators button.active {
            background-color: white;
        }
        
        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .navbar .nav-link.active:after {
                display: none;
            }
            
            .profile-dropdown .dropdown-toggle {
                padding: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <div class="navbar-brand-icon">
                    <i class="bi bi-journal-text"></i>
                </div>
                BlogHub
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs.index') }}">Dashboard</a>
                    </li>
                  
                </ul>
                
                <!-- Guest View (Not Logged In) -->
                @guest
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-login">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                </div>
                @endguest
                
                <!-- Authenticated User View -->
                @auth
                <div class="dropdown profile-dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-avatar">
                            @if(Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}">
                            @else
                                {{ substr(Auth::user()->name, 0, 1) }}
                            @endif
                        </div>
                        <div class="profile-info d-none d-sm-flex">
                            <span class="profile-name">{{ Auth::user()->name }}</span>
                            <span class="profile-email">{{ Auth::user()->email }}</span>
                        </div>
                        <i class="bi bi-chevron-down ms-2 d-none d-sm-block"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li>
                            <a class="dropdown-item" href="">
                                <i class="bi bi-person"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('blogs.create') }}">
                                <i class="bi bi-plus-circle"></i> Create Blog
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="">
                                <i class="bi bi-pencil-square"></i> Manage Blogs
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="">
                                <i class="bi bi-gear"></i> Settings
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item dropdown-item-danger" href="{{ route('logout') }}" >
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                          
                        </li>
                    </ul>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Blog Content -->
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 blog-title">Our Blog</h1>
                <p class="lead text-muted">Discover the latest articles and insights from our team</p>
            </div>
        </div>

        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        @php
                        $carouselId = 'carousel-' . $blog->id;
                        $featuredImage = is_array($blog->featured_image) ? ($blog->featured_image[0] ?? null) : $blog->featured_image;
                        $galleryImages = json_decode($blog->gallery_images, true) ?? [];
                        $allImages = array_filter(array_merge([$featuredImage], $galleryImages));
                        @endphp
                    
                        <div id="{{ $carouselId }}" class="carousel slide card-img-top" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach ($allImages as $index => $image)
                                    <button type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach ($allImages as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $blog->title }}</h5>
                            <p class="card-text mb-4">{!! strip_tags($blog->content) !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="author-badge">
                                    <i class="bi bi-person-fill me-1"></i>
                                    {{ $blog->user->name ?? 'Fawwaz' }}
                                </span>
                                <span class="date-badge">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $blog->published_at->format('F j, Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 pt-0">
                            <a href="{{ route('detail', $blog->id) }}" class="read-more">Read more <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($blogs->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="bi bi-journal-x"></i>
                </div>
                <h3>No blogs found</h3>
                <p class="text-muted">Check back later for new content</p>
            </div>
        @endif
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>
</html>
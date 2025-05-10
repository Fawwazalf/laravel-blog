<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Management</title>
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
            font-weight: 500;
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
            margin-right: 0.5rem;
            width: 16px;
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
        
        /* Dashboard Indicator */
        .dashboard-indicator {
            display: flex;
            align-items: center;
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-left: 1rem;
        }
        
        .dashboard-indicator i {
            margin-right: 0.35rem;
            font-size: 0.9rem;
        }
        
        /* Original Styles */
        .page-title {
            font-weight: 700;
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        
        .page-title:after {
            content: '';
            position: absolute;
            width: 70px;
            height: 4px;
            background-color: #0d6efd;
            bottom: -10px;
            left: 0;
            border-radius: 2px;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            border-top: none;
            font-weight: 600;
            color: #495057;
            background-color: #f8f9fa;
            padding: 1rem;
        }
        
        .table td {
            padding: 1rem;
            vertical-align: middle;
        }
        
        .table-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        
        .table-title {
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.25rem;
        }
        
        .table-content {
            color: #6c757d;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 0.9rem;
        }
        
        .badge {
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            border-radius: 50px;
        }
        
        .badge-published {
            background-color: #10b981;
            color: white;
        }
        
        .badge-draft {
            background-color: #f59e0b;
            color: white;
        }
        
        .badge-scheduled {
            background-color: #6366f1;
            color: white;
        }
        
        .btn {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
        
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        
        .btn-primary:hover {
            background-color: #0a58ca;
            border-color: #0a58ca;
        }
        
        .btn-success {
            background-color: #10b981;
            border-color: #10b981;
        }
        
        .btn-success:hover {
            background-color: #0e9f6e;
            border-color: #0e9f6e;
        }
        
        .btn-info {
            background-color: #3b82f6;
            border-color: #3b82f6;
            color: white;
        }
        
        .btn-info:hover {
            background-color: #2563eb;
            border-color: #2563eb;
            color: white;
        }
        
        .btn-warning {
            background-color: #f59e0b;
            border-color: #f59e0b;
            color: white;
        }
        
        .btn-warning:hover {
            background-color: #d97706;
            border-color: #d97706;
            color: white;
        }
        
        .btn-danger {
            background-color: #ef4444;
            border-color: #ef4444;
        }
        
        .btn-danger:hover {
            background-color: #dc2626;
            border-color: #dc2626;
        }
        
        .btn-icon {
            width: 32px;
            height: 32px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box .form-control {
            padding-left: 2.5rem;
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }
        
        .search-box .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        .pagination {
            margin-bottom: 0;
        }
        
        .page-link {
            color: #0d6efd;
            border: none;
            padding: 0.5rem 0.75rem;
            margin: 0 0.25rem;
            border-radius: 8px;
        }
        
        .page-item.active .page-link {
            background-color: #0d6efd;
            color: white;
        }
        
        .page-item.disabled .page-link {
            color: #6c757d;
            background-color: transparent;
        }
        
        .modal-content {
            border: none;
            border-radius: 12px;
        }
        
        .modal-header {
            border-bottom: 1px solid #e9ecef;
            padding: 1.5rem;
        }
        
        .modal-title {
            font-weight: 600;
        }
        
        .modal-body {
            padding: 1.5rem;
        }
        
        .modal-footer {
            border-top: 1px solid #e9ecef;
            padding: 1.5rem;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #ced4da;
        }
        
        .form-text {
            color: #6c757d;
            font-size: 0.875rem;
        }
        
        .image-preview {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            margin-bottom: 1rem;
            overflow: hidden;
        }
        
        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .gallery-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .gallery-item {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .gallery-item .remove-btn {
            position: absolute;
            top: 0.25rem;
            right: 0.25rem;
            width: 20px;
            height: 20px;
            background-color: rgba(239, 68, 68, 0.8);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            cursor: pointer;
        }
        
        .add-gallery-btn {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            border: 2px dashed #ced4da;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .add-gallery-btn:hover {
            border-color: #0d6efd;
            color: #0d6efd;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: capitalize;
        }
        
        .status-published {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }
        
        .status-draft {
            background-color: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }
        
        .status-scheduled {
            background-color: rgba(99, 102, 241, 0.1);
            color: #6366f1;
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
                PostHub
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
                        <a class="nav-link" href="{{ route('post-images.index') }}">Dashboard</a>
                    </li>
                </ul>
                
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
                            <a class="dropdown-item" href="{{ route('post-images.create') }}">
                                <i class="bi bi-plus-circle"></i> Create Post
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="">
                                <i class="bi bi-pencil-square"></i> Manage post-images
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
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="page-title">Post Management</h1>
            <a href="{{ url('/dashboard/post-images/create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i> Add New Post
            </a>
        </div>
        
        <div class="card mb-4">
            <div class="card-body p-4">
                <form method="GET" action="{{ url()->current() }}">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <div class="search-box">
                                <i class="bi bi-search search-icon"></i>
                                <input type="text" name="search" class="form-control" placeholder="Search post-images..." value="{{ request('search', '') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select name="status" class="form-select">
                                <option value="">All Status</option>
                                <option value="published" {{ request('status', '') == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ request('status', '') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="scheduled" {{ request('status', '') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="perPage" class="form-select">
                                <option value="10" {{ request('perPage', 10) == '10' ? 'selected' : '' }}>10 per page</option>
                                <option value="25" {{ request('perPage', 10) == '25' ? 'selected' : '' }}>25 per page</option>
                                <option value="50" {{ request('perPage', 10) == '50' ? 'selected' : '' }}>50 per page</option>
                                <option value="100" {{ request('perPage', 10) == '100' ? 'selected' : '' }}>100 per page</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-outline-secondary w-100">
                                <i class="bi bi-funnel me-2"></i> Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th style="width: 80px;">Image</th>
                            <th>Title & Content</th>
                            <th style="width: 150px;">Status</th>
                            <th style="width: 180px;">Published Date</th>
                            <th style="width: 180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postImages as $post_image)
                        <tr>
                            <td>
                                <img src="/storage/{{ $post_image->featured_image }}" class="table-img" alt="Post image">
                            </td>
                            <td>
                                <div class="table-title">{{$post_image->title}}</div>
                                <div class="table-content">{!! strip_tags($post_image->content) !!}</div>
                            </td>
                            <td>
                                <span class="status-badge status-{{ $post_image->status }}">{{ $post_image->status }}</span>
                            </td>
                            <td>{{$post_image->published_at?->format('D, d M Y')}}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('detail', $post_image->id) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('post-images.edit', $post_image->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePostModal{{ $post_image->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-muted">Showing 1 to 5 of 12 entries</div>
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    
    @foreach ($postImages as $post_image)
    <!-- Delete Post Modal -->
    <div class="modal fade" id="deletePostModal{{ $post_image->id }}" tabindex="-1" aria-labelledby="deletePostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('post-images.destroy', $post_image->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePostModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the post_image "<strong>{{$post_image->title}}</strong>"?</p>
                        <p class="text-danger">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>
</html>
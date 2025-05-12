<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post_image->title }} - Blog Detail</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            line-height: 1.7;
        }
        
        .post-image-header {
            position: relative;
            height: 400px;
            background-color: #343a40;
            margin-bottom: 2rem;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .post-image-header-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
        }
        
        .post-image-header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.7));
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2rem;
            color: white;
        }
        
        .post-image-title {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        .post-image-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .post-image-meta-item {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .post-image-meta-item i {
            margin-right: 0.5rem;
        }
        
        .post-image-content {
            background-color: white;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }
        
        .post-image-content p {
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
        }
        
        .post-image-content h2 {
            font-weight: 600;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-size: 1.75rem;
        }
        
        .post-image-content h3 {
            font-weight: 600;
            margin-top: 1.75rem;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        
        .post-image-content img {
            max-width: 100%;
            border-radius: 8px;
            margin: 1.5rem 0;
        }
        
        .post-image-content blockquote {
            border-left: 4px solid #0d6efd;
            padding-left: 1.5rem;
            margin-left: 0;
            margin-right: 0;
            font-style: italic;
            color: #495057;
        }
        
        .post-image-content ul, .post-image-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }
        
        .post-image-content li {
            margin-bottom: 0.5rem;
        }
        
        .post-image-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e9ecef;
        }
        
        .post-image-tag {
            background-color: #e9ecef;
            color: #495057;
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .post-image-tag:hover {
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
        }
        
        .post-image-navigation {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
        }
        
        .post-image-nav-link {
            display: flex;
            align-items: center;
            color: #0d6efd;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .post-image-nav-link:hover {
            color: #0a58ca;
            text-decoration: underline;
        }
        
        .post-image-nav-link i {
            font-size: 1.2rem;
        }
        
        .post-image-nav-prev i {
            margin-right: 0.5rem;
        }
        
        .post-image-nav-next i {
            margin-left: 0.5rem;
        }
        
        .post-image-author {
            background-color: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .post-image-author-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #6c757d;
            flex-shrink: 0;
        }
        
        .post-image-author-info h4 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .post-image-author-info p {
            color: #6c757d;
            margin-bottom: 0;
        }
        
        .post-image-more {
            margin-bottom: 2rem;
            overflow-y: scroll;
            height: 1200px;
        }
        
        .post-image-more-title {
            font-weight: 700;
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        
        .post-image-more-title:after {
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
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        
        .card-title {
            font-weight: 600;
            color: #212529;
            font-size: 1.1rem;
        }
        
        .card-text {
            color: #6c757d;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .read-more {
            color: #0d6efd;
            font-weight: 500;
            text-decoration: none;
        }
        
        .read-more:hover {
            text-decoration: underline;
        }
        
        .post-image-comments {
            background-color: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .post-image-comments-title {
            font-weight: 700;
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        
        .post-image-comments-title:after {
            content: '';
            position: absolute;
            width: 70px;
            height: 4px;
            background-color: #0d6efd;
            bottom: -10px;
            left: 0;
            border-radius: 2px;
        }
        
        .post-image-comment {
            display: flex;
            gap: 1rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .post-image-comment:last-child {
            border-bottom: none;
        }
        
        .post-image-comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #6c757d;
            flex-shrink: 0;
        }
        
        .post-image-comment-content h5 {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }
        
        .post-image-comment-date {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        
        .post-image-comment-text {
            color: #495057;
        }
        
        .post-image-comment-form {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e9ecef;
        }
        
        .post-image-comment-form h4 {
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #ced4da;
        }
        
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-primary:hover {
            background-color: #0a58ca;
            border-color: #0a58ca;
        }
        
        .back-to-post_images {
            display: inline-flex;
            align-items: center;
            color: #0d6efd;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 1.5rem;
            transition: all 0.2s;
        }
        
        .back-to-post_images:hover {
            color: #0a58ca;
            text-decoration: underline;
        }
        
        .back-to-post_images i {
            margin-right: 0.5rem;
        }
        
        .reading-time {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
        }
        
        .reading-time i {
            margin-right: 0.5rem;
        }
        
        .social-share {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
        }
        
        .social-share-title {
            font-weight: 600;
            margin-right: 0.5rem;
        }
        
        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #495057;
            transition: all 0.2s;
        }
        
        .social-icon:hover {
            background-color: #0d6efd;
            color: white;
        }

          /* Carousel adjustments */
        .carousel {
            
            overflow: hidden;
        }
        
        .carousel-item img {
          
            object-fit: fill;
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
        
        @media (max-width: 767.98px) {
            .post-image-header {
                height: 300px;
            }
            
            .post-image-title {
                font-size: 1.75rem;
            }
            
            .post-image-meta {
                gap: 1rem;
            }
            
            .post-image-content {
                padding: 1.5rem;
            }
            
            .post-image-author {
                flex-direction: column;
                align-items: center;
                text-align: center;
                padding: 1.5rem;
            }
            
            .post-image-comment {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <a href="{{ route('index') }}" class="back-to-post_images">
            <i class="bi bi-arrow-left"></i> Back to Blogs
        </a>
        
        <div class="post-image-header">
            
              @php
                    $galleryImages = json_decode($post_image->gallery_images, true) ?? [];
                    $allImages = array_merge([$post_image->featured_image], $galleryImages);
                @endphp
                
                <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    @foreach ($allImages as $index => $image)
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                  </div>
                  <div class="carousel-inner">
                    @foreach ($allImages as $index => $image)
                      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $image) }}" class="post-image-header-img" alt="Slide {{ $index + 1 }}">
                      </div>
                    @endforeach
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
            <div class="post-image-header-overlay">
                <h1 class="post-image-title">{{ $post_image->title }}</h1>
                <div class="post-image-meta">
                    <div class="post-image-meta-item">
                        <i class="bi bi-person-fill"></i>
                        {{ $post_image->user->name ?? 'Fawwaz' }}
                    </div>
                    <div class="post-image-meta-item">
                        <i class="bi bi-calendar3"></i>
                        {{ $post_image->published_at->format('F j, Y') }}
                    </div>
                    <div class="post-image-meta-item reading-time">
                        <i class="bi bi-clock"></i>
                        5 min read
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="post-image-content">
                    <p>
                        {!! $post_image->content !!}
                    </p>
    
                    
                    <div class="post-image-tags">
                        <a href="#" class="post-image-tag">Technology</a>
                        <a href="#" class="post-image-tag">Design</a>
                        <a href="#" class="post-image-tag">Development</a>
                        <a href="#" class="post-image-tag">Web</a>
                    </div>
                    
                    <div class="social-share">
                        <span class="social-share-title">Share:</span>
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
                
                <div class="post-image-navigation">
                        @if ($previousPostImage)
                    <a href="{{ route('detail.post-image', $previousPostImage) }}" class="post-image-nav-link post-image-nav-prev">
                        <i class="bi bi-arrow-left"></i> Previous Post
                    </a>
                     @endif
                    @if ($nextPostImage)
                    <a href="{{ route('detail.post-image', $nextPostImage) }}" class="post-image-nav-link post-image-nav-next">
                        Next Post <i class="bi bi-arrow-right"></i>
                    </a>
                    @endif
                </div>
                
                <div class="post-image-author">
                    <div class="post-image-author-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="post-image-author-info">
                        <h4>{{ $post_image->user->name ?? 'Fawwaz' }}</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.</p>
                    </div>
                </div>
                
                <div class="post-image-comments">
                    <h3 class="post-image-comments-title">Comments ({{ $post_image->comments?->count() }})</h3>
                    @foreach ($post_image->comments as $comment)
                    <div class="post-image-comment">
                        <div class="post-image-comment-avatar">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="post-image-comment-content">
                            <h5>{{$comment->user->name}}</h5>
                            <div class="post-image-comment-date">{{$comment->created_at?->format('D, m M Y')}}</div>
                            <p class="post-image-comment-text">{{$comment->body}}</p>
                        </div>
                    </div>
                    @endforeach
                    
                 
                    
                   
                    
                    <div class="post-image-comment-form">
                        <h4>Leave a Comment</h4>
                        <form action="{{ route('comments.store', ['type' => 'post-image', 'id' => $post_image->id]) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Your Comment" name="body" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="post-image-more">
                    <h3 class="post-image-more-title">More Posts</h3>
                    @foreach ($post_images as $post_image)
                    <div class="card mb-4 shadow-sm">
                    
                    
                    <div class="card h-100 shadow-sm">
                        <div class=" card-img-top">
                           <img src="/storage/{{$post_image->image_path  }}" alt="">
                        </div>
                    
                        <div class="card-body">
                          
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="author-badge line-clamp-1">
                                    <i class="bi bi-person-fill me-1"></i>
                                    {{ $post_image->user->name ?? 'Fawwaz' }}
                                </span>
                                <span class="date-badge">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $post_image->published_at->format('F j, Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 pt-0">
                            <a href="{{ route('detail.post-image', $post_image->id) }}" class="read-more">Read more <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>
</html>
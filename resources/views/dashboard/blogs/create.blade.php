<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
        }
        
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
        
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #495057;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #ced4da;
            font-size: 1rem;
        }
        
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        .form-text {
            color: #6c757d;
            font-size: 0.875rem;
            margin-top: 0.25rem;
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
        
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        
        .btn-secondary:hover {
            background-color: #5c636a;
            border-color: #5c636a;
        }
        
        .btn-outline-primary {
            color: #0d6efd;
            border-color: #0d6efd;
        }
        
        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
        }
        
        .image-preview {
            width: 100%;
            height: 300px;
            border-radius: 8px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            margin-bottom: 1rem;
            overflow: hidden;
            position: relative;
        }
        
        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .image-preview-placeholder {
            text-align: center;
            padding: 2rem;
        }
        
        .image-preview-placeholder i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.7;
        }
        
        .image-preview-placeholder p {
            margin-bottom: 0;
            font-size: 1.1rem;
        }
        
        .image-preview-actions {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
        }
        
        .image-action-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #495057;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }
        
        .image-action-btn:hover {
            background-color: white;
            color: #0d6efd;
        }
        
        .gallery-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .gallery-item {
            width: 150px;
            height: 150px;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .gallery-item-actions {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            display: flex;
            gap: 0.5rem;
        }
        
        .gallery-action-btn {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: red;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            font-size: 0.8rem;
        }
        
        .gallery-action-btn:hover {
            background-color: white;
            color: #0d6efd;
        }
        
        .gallery-action-btn.remove:hover {
            color: #dc3545;
        }
        
        .add-gallery-btn {
            width: 150px;
            height: 150px;
            border-radius: 8px;
            border: 2px dashed #ced4da;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            cursor: pointer;
            transition: all 0.2s;
            background-color: white;
        }
        
        .add-gallery-btn:hover {
            border-color: #0d6efd;
            color: #0d6efd;
        }
        
        .add-gallery-btn i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .editor-toolbar {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-bottom: none;
            border-radius: 8px 8px 0 0;
            padding: 0.5rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.25rem;
        }
        
        .editor-content {
            border: 1px solid #ced4da;
            border-radius: 0 0 8px 8px;
            padding: 1rem;
            min-height: 300px;
            background-color: white;
        }
        
        .editor-content:focus {
            outline: none;
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        
        
        .publish-options {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .publish-option {
            margin-bottom: 1rem;
        }
        
        .publish-option:last-child {
            margin-bottom: 0;
        }
        
        .publish-option-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .publish-option-title i {
            margin-right: 0.5rem;
            color: #0d6efd;
        }
        
        .publish-option-description {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
        }
        
        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        
        .schedule-options {
            margin-top: 0.75rem;
            padding-left: 1.5rem;
        }
        
        .tag-input-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            padding: 0.5rem;
            border: 1px solid #ced4da;
            border-radius: 8px;
            background-color: white;
        }
        
        .tag {
            display: inline-flex;
            align-items: center;
            background-color: #e9ecef;
            color: #495057;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.875rem;
        }
        
        .tag .remove-tag {
            margin-left: 0.5rem;
            cursor: pointer;
            font-size: 0.75rem;
            width: 18px;
            height: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(0,0,0,0.1);
            transition: all 0.2s;
        }
        
        .tag .remove-tag:hover {
            background-color: rgba(0,0,0,0.2);
        }
        
        .tag-input {
            flex: 1;
            border: none;
            outline: none;
            padding: 0.25rem;
            min-width: 100px;
        }
        
        .tag-input:focus {
            outline: none;
        }
        
        .form-floating > .form-control {
            padding-top: 1.625rem;
            padding-bottom: 0.625rem;
            height: calc(3.5rem + 2px);
        }
        
        .form-floating > label {
            padding: 1rem 0.75rem;
        }
        
        .sticky-sidebar {
            position: sticky;
            top: 2rem;
        }
        
        @media (max-width: 767.98px) {
            .sticky-sidebar {
                position: static;
                margin-top: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="page-title">Create New Blog</h1>
            <a href="{{ route('blogs.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left me-2"></i> Back to Blogs
            </a>
        </div>
        
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <!-- Main Content Card -->
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <label for="title" class="form-label">Blog Title</label>
                                <input type="text" class="form-control form-control-lg" id="title" name="title" placeholder="Enter blog title" required>
                                <div class="form-text">Make it descriptive and unique. This will appear as the headline of your blog post.</div>
                                @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Content</label>
                                <textarea name="content" id="summernote" class="form-control" rows="100"></textarea>
                               
                                @error('content')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Featured Image Card -->
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">Featured Image</h5>
                           <div class="image-preview position-relative">
    <div class="image-preview-placeholder text-center">
        <i class="bi bi-image" style="font-size: 3rem;"></i>
        <p>Upload a high-quality image for your blog post</p>
        <button type="button" class="btn btn-outline-primary mt-3" id="upload-featured-trigger">
            <i class="bi bi-upload me-2"></i> Choose Image
        </button>
    </div>
    <img src="" id="featured-preview-img" class="img-fluid d-none mt-3" />
    <div class="image-preview-actions d-none mt-2">
        <button type="button"  class="gallery-action-btn m-1" id="replace-featured">
            <i class="bi bi-arrow-repeat"></i>
        </button>
         <button type="button" class="gallery-action-btn m-1" id="remove-featured">
                            <i class="bi bi-trash"></i>
         </button>
    </div>
</div>
<input type="file" class="d-none" id="featured_image" name="featured_image" accept="image/*">
                            <div class="form-text">Recommended size: 1200 x 630 pixels. Maximum file size: 2MB.</div>
                            @error('featured_image')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
               
                  <div class="card mb-4">
    <div class="card-body p-4">
        <h5 class="card-title mb-3">Gallery Images</h5>

        <div class="gallery-preview d-flex flex-wrap gap-3 mt-3" id="gallery-preview-container">
            <div class="add-gallery-btn text-center d-flex flex-column justify-content-center align-items-center"
                 id="upload-gallery-trigger" style="width: 150px; height: 150px; border: 2px dashed #ccc; cursor: pointer;">
                <i class="bi bi-plus-lg" style="font-size: 2rem;"></i>
                <span>Add Images</span>
            </div>
        </div>

        <!-- container untuk input file dinamis -->
        <div id="gallery-inputs"></div>

        <div class="form-text">You can upload multiple images for your blog gallery. Maximum 10 images.</div>

        @error('gallery_images')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
                </div>

                
                <div class="col-lg-4">
                    <div class="sticky-sidebar">
                        <!-- Publish Options Card -->
                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <h5 class="card-title mb-3">Publish Settings</h5>
                                
                                <div class="publish-options">
                                    <div class="publish-option">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="publish-now" value="published" {{ old('status', 'published') === 'published' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="publish-now">
                                                <div class="publish-option-title">
                                                    <i class="bi bi-lightning-charge"></i> Publish Now
                                                </div>
                                                <div class="publish-option-description">
                                                    Make this blog post publicly available immediately.
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="publish-option">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="publish-schedule" value="scheduled" {{ old('status', 'scheduled') === 'scheduled' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="publish-schedule">
                                                <div class="publish-option-title">
                                                    <i class="bi bi-calendar-event"></i> Schedule
                                                </div>
                                                <div class="publish-option-description">
                                                    Set a future date and time to publish this blog post.
                                                </div>
                                            </label>
                                        </div>
                                        
                                        <div class="schedule-options d-none" id="schedule-options">
                                            <div class="mb-3">
                                                <label for="published_at" class="form-label">Publish Date & Time</label>
                                                <input type="datetime-local" class="form-control" id="published_at" name="published_at">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="publish-option">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="publish-draft" value="draft" {{ old('status', 'draft') === 'draft' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="publish-draft">
                                                <div class="publish-option-title">
                                                    <i class="bi bi-file-earmark"></i> Save as Draft
                                                </div>
                                                <div class="publish-option-description">
                                                    Save this blog post as a draft to publish later.
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Categories & Tags Card -->
                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <h5 class="card-title mb-3">Categories & Tags</h5>
                                
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" name="category">
                                        <option value="">Select a category</option>
                                        <option value="technology">Technology</option>
                                        <option value="design">Design</option>
                                        <option value="business">Business</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="development">Development</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tags</label>
                                    <div class="tag-input-container">
                                        <div class="tag">
                                            Web Design <span class="remove-tag"><i class="bi bi-x"></i></span>
                                        </div>
                                        <div class="tag">
                                            Tutorial <span class="remove-tag"><i class="bi bi-x"></i></span>
                                        </div>
                                        <input type="text" class="tag-input" placeholder="Add a tag...">
                                    </div>
                                    <div class="form-text">Press Enter or comma to add a tag</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- SEO Card -->
                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <h5 class="card-title mb-3">SEO Settings</h5>
                                
                                <div class="mb-3">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter meta title">
                                    <div class="form-text">Recommended length: 50-60 characters</div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3" placeholder="Enter meta description"></textarea>
                                    <div class="form-text">Recommended length: 150-160 characters</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg me-2"></i> Create Blog Post
                            </button>
                            <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

      document.addEventListener('DOMContentLoaded', function() {
    const featuredInput = document.getElementById('featured_image');
    const uploadTrigger = document.getElementById('upload-featured-trigger');
    const replaceBtn = document.getElementById('replace-featured');
    const removeBtn = document.getElementById('remove-featured');
    const previewImg = document.getElementById('featured-preview-img');
    const placeholder = document.querySelector('.image-preview-placeholder');
    const actions = document.querySelector('.image-preview-actions');

    function showPreview(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.classList.remove('d-none');
            placeholder.classList.add('d-none');
            actions.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }

    uploadTrigger.addEventListener('click', function() {
        featuredInput.click();
    });

    featuredInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            showPreview(this.files[0]);
        }
    });

    replaceBtn.addEventListener('click', function() {
        featuredInput.click();
    });

    removeBtn.addEventListener('click', function() {
        featuredInput.value = '';
        previewImg.src = '';
        previewImg.classList.add('d-none');
        placeholder.classList.remove('d-none');
        actions.classList.add('d-none');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const trigger = document.getElementById('upload-gallery-trigger');
    const previewContainer = document.getElementById('gallery-preview-container');
    const inputsContainer = document.getElementById('gallery-inputs');

    let index = 0;

    trigger.addEventListener('click', () => {
        const input = document.createElement('input');
        input.type = 'file';
        input.name = `gallery_images[${index}]`;
        input.accept = 'image/*';
        input.classList.add('d-none');

        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const preview = document.createElement('div');
                    preview.className = 'position-relative image-fade-in';
                    preview.style.width = '150px';
                    preview.style.height = '150px';

                    preview.innerHTML = `
                        <img src="${e.target.result}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;" />
                         <button class="gallery-action-btn position-absolute top-0 end-0 m-1 remove-image">
                            <i class="bi bi-trash"></i>
                        </button>
                    `;

                    preview.querySelector('.remove-image').addEventListener('click', () => {
                        preview.remove();
                        input.remove();
                    });

                    previewContainer.insertBefore(preview, trigger);
                    inputsContainer.appendChild(input);
                };

                reader.readAsDataURL(file);
                index++;
            }
        });

        document.body.appendChild(input);
        input.click();
    });
});


    </script>
    
    <script>
        
        // document.addEventListener('DOMContentLoaded', function() {
       
        //     const featuredImageInput = document.getElementById('featured_image');
        //     const uploadFeaturedTrigger = document.getElementById('upload-featured-trigger');
        //     const replaceFeatured = document.getElementById('replace-featured');
        //     const removeFeatured = document.getElementById('remove-featured');
        //     const imagePreview = document.querySelector('.image-preview');
        //     const imagePreviewPlaceholder = document.querySelector('.image-preview-placeholder');
        //     const imagePreviewActions = document.querySelector('.image-preview-actions');
            
        //     uploadFeaturedTrigger.addEventListener('click', function() {
        //         featuredImageInput.click();
        //     });
            
        //     featuredImageInput.addEventListener('change', function() {
        //         if (this.files && this.files[0]) {
        //             const reader = new FileReader();
                    
        //             reader.onload = function(e) {
                     
        //                 imagePreviewPlaceholder.classList.add('d-none');
                        
                    
        //                 let previewImg = imagePreview.querySelector('img');
        //                 if (!previewImg) {
        //                     previewImg = document.createElement('img');
        //                     imagePreview.appendChild(previewImg);
        //                 }
                        
                     
        //                 previewImg.src = e.target.result;
        //                 imagePreviewActions.classList.remove('d-none');
        //             }
                    
        //             reader.readAsDataURL(this.files[0]);
        //         }
        //     });
            
        //     replaceFeatured.addEventListener('click', function() {
        //         featuredImageInput.click();
        //     });
            
        //     removeFeatured.addEventListener('click', function() {
        //         const previewImg = imagePreview.querySelector('img');
        //         if (previewImg) {
        //             previewImg.remove();
        //         }
                
        //         featuredImageInput.value = '';
        //         imagePreviewPlaceholder.classList.remove('d-none');
        //         imagePreviewActions.classList.add('d-none');
        //     });
            
        
        //     const galleryImagesInput = document.getElementById('gallery_images');
        //     const uploadGalleryTrigger = document.getElementById('upload-gallery-trigger');
        //     const galleryPreview = document.querySelector('.gallery-preview');
            
        //     uploadGalleryTrigger.addEventListener('click', function() {
        //         galleryImagesInput.click();
        //     });
            
        //     galleryImagesInput.addEventListener('change', function() {
        //         if (this.files && this.files.length > 0) {
        //             for (let i = 0; i < this.files.length; i++) {
        //                 const file = this.files[i];
        //                 const reader = new FileReader();
                        
        //                 reader.onload = function(e) {
            
        //                     const galleryItem = document.createElement('div');
        //                     galleryItem.className = 'gallery-item';
                            
                           
        //                     const img = document.createElement('img');
        //                     img.src = e.target.result;
        //                     galleryItem.appendChild(img);
                            
                          
        //                     const actions = document.createElement('div');
        //                     actions.className = 'gallery-item-actions';
                            
                            
        //                     const removeBtn = document.createElement('button');
        //                     removeBtn.className = 'gallery-action-btn remove';
        //                     removeBtn.innerHTML = '<i class="bi bi-trash"></i>';
        //                     removeBtn.addEventListener('click', function() {
        //                         galleryItem.remove();
        //                     });
                            
        //                     actions.appendChild(removeBtn);
        //                     galleryItem.appendChild(actions);
                            
                          
        //                     galleryPreview.insertBefore(galleryItem, uploadGalleryTrigger);
        //                 }
                        
        //                 reader.readAsDataURL(file);
        //             }
        //         }
        //     });
            
        //     // Schedule options toggle
        //     const publishSchedule = document.getElementById('publish-schedule');
        //     const scheduleOptions = document.getElementById('schedule-options');
            
        //     publishSchedule.addEventListener('change', function() {
        //         if (this.checked) {
        //             scheduleOptions.classList.remove('d-none');
        //         } else {
        //             scheduleOptions.classList.add('d-none');
        //         }
        //     });
            
        //     document.querySelectorAll('input[name="status"]').forEach(function(radio) {
        //         radio.addEventListener('change', function() {
        //             if (this.value === 'schedule') {
        //                 scheduleOptions.classList.remove('d-none');
        //             } else {
        //                 scheduleOptions.classList.add('d-none');
        //             }
        //         });
        //     });
            
        //     // Tag input handling
        //     const tagInput = document.querySelector('.tag-input');
        //     const tagContainer = document.querySelector('.tag-input-container');
            
        //     tagInput.addEventListener('keydown', function(e) {
        //         if (e.key === 'Enter' || e.key === ',') {
        //             e.preventDefault();
                    
        //             const tagText = this.value.trim();
        //             if (tagText) {
        //                 addTag(tagText);
        //                 this.value = '';
        //             }
        //         }
        //     });
            
    
        //     tagContainer.addEventListener('click', function(e) {
        //         if (e.target.classList.contains('remove-tag') || e.target.parentElement.classList.contains('remove-tag')) {
        //             const tag = e.target.closest('.tag');
        //             if (tag) {
        //                 tag.remove();
        //             }
        //         }
        //     });
            
        //     function addTag(text) {
        //         const tag = document.createElement('div');
        //         tag.className = 'tag';
        //         tag.innerHTML = `${text} <span class="remove-tag"><i class="bi bi-x"></i></span>`;
                
        //         tagContainer.insertBefore(tag, tagInput);
        //     }
            
        
        // });
    </script>
</body>
</html>
@extends('admin.layouts.layout')
@section('title', 'Create Category')
@section('description')
    Create a new category for organizing products.
@endsection
@section('css')
    .image-preview {
    max-width: 200px;
    max-height: 200px;
    margin-top: 10px;
    display: none;
    }

    .form-label {
    font-weight: 500;
    }

    .slug-container {
    background-color: #e9ecef;
    border-radius: 0.375rem;
    padding: 0.375rem 0.75rem;
    font-family: monospace;
    }
@endsection
@section('admin_layout')
    <script>
        @if(session('success'))
        toastr.success("{{ session('success') }}");
        @endif

        @if(session('error'))
        toastr.error("{{ session('error') }}");
        @endif
    </script>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Create New Category</h4>
            <a href="{{ route('admin.category.manage') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-left me-1"></i> Back to Categories
            </a>
        </div>
        <div class="card-body">
            <form id="categoryForm" method="POSt" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Category Name -->
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Category Name <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('category_name') is-invalid @enderror "
                           name="category_name" id="categoryName" placeholder="Enter category name"
                           value="{{ old('category_name') }}">
                    <div class="form-text">Enter a descriptive name for your category.</div>
                    @error('category_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug (Auto-generated) -->
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="category_slug" readonly id="slugPreview" class="form-control @error('category_slug') is-invalid @enderror "
                           value="{{ old('category_slug') }}"
                           placeholder="slug-will-appear-here">
                    <div class="form-text">This is automatically generated from the category name. Used for URLs.</div>
                    @error('category_slug')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="categoryImage" class="form-label">Category Image</label>
                    <input class="form-control" type="file" name="category_image" id="categoryImage" accept="image/*">
                    <div class="form-text">Upload an image that represents this category. Recommended size: 300x300px.
                    </div>
                    <img id="imagePreview" class="image-preview img-thumbnail" src="#" alt="Image preview">
                    @error('category_image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="statusActive" value="1"
                               checked>
                        <label class="form-check-label" for="statusActive">
                            <i class="fas fa-circle text-success me-1"></i> Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="statusInactive" value="0">
                        <label class="form-check-label" for="statusInactive">
                            <i class="fas fa-circle text-secondary me-1"></i> Inactive
                        </label>
                    </div>
                    <div class="form-text">Active categories will be visible on your site.</div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary me-md-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categoryNameInput = document.getElementById('categoryName');
            const slugPreview = document.getElementById('slugPreview');
            const categoryImageInput = document.getElementById('categoryImage');
            const imagePreview = document.getElementById('imagePreview');

            function generateSlug(text) {
                return text
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }


            // Slug generation
            categoryNameInput.addEventListener('input', function () {
                const slug = generateSlug(this.value);
                slugPreview.value = slug;
            })
            // Image preview
            categoryImageInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.addEventListener('load', function () {
                        imagePreview.style.display = 'block';
                        imagePreview.src = reader.result;
                    });

                    reader.readAsDataURL(file);
                } else {
                    imagePreview.style.display = 'none';
                    imagePreview.src = '#';
                }
            });
        })
    </script>
@endsection

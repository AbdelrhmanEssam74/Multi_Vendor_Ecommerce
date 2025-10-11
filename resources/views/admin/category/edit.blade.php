@extends('admin.layouts.layout')
@section('title', 'Edit Category | ' .  $category->category_name)

@section('description')
    Edit the details of the category "{{ $category->category_name }}". Update the name, slug, image, and status of the category.
@endsection
@section('css')
    .form-check-label,
    .form-check-input{
    cursor: pointer;
    }
    .form-label {
    font-weight: 600;
    color: #5a5c69;
    margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
    border: 1px solid #d1d3e2;
    border-radius: 0.35rem;
    padding: 0.75rem 1rem;
    }

    .form-control:focus, .form-select:focus {
    border-color: var(--bs-primary);
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .slug-container {
    background-color: #f8f9fc;
    border: 1px solid #d1d3e2;
    border-radius: 0.35rem;
    padding: 0.75rem 1rem;
    font-family: monospace;
    color: #6e707e;
    }

    .image-preview-container {
    position: relative;
    display: inline-block;
    margin-top: 10px;
    }

    .image-preview {
    max-width: 200px;
    max-height: 200px;
    border-radius: 0.35rem;
    border: 1px solid #e3e6f0;
    }

    .btn-remove-image {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: var(--bs-danger);
    color: white;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    font-size: 0.8rem;
    }

    .btn-remove-image:hover {
    background-color: #c53030;
    }

    .breadcrumb {
    display: flex;
    background-color: transparent;
    padding: 0;
    margin-bottom: 1.5rem;
    }
    .breadcrumb {
    list-style: none;
    }
    .breadcrumb-item a {
    margin-right: 0.5rem;
    color: var(--bs-primary);
    text-decoration: none;
    }

    .status-badge {
    padding: 0.35em 0.65em;
    font-size: 0.75em;
    font-weight: 600;
    }

    .stats-card {
    border-left: 4px solid;
    }

    .stats-card.primary {
    border-left-color: var(--bs-primary);
    }

    .stats-number {
    font-size: 1.5rem;
    font-weight: 700;
    }

    .stats-text {
    font-size: 0.8rem;
    color: #5a5c69;
    }

    .form-section {
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e3e6f0;
    }

    .form-section:last-of-type {
    border-bottom: none;
    }

    .section-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #4e73df;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #e3e6f0;
    }
@endsection
@section('admin_layout')
    <!-- Main Content -->
    <div class="container-fluid mt-4">
        <!-- Breadcrumb -->
        <nav aria-label="Breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                >
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.category.manage') }}">Categories</a>
                </li>
                >
                <li class="breadcrumb-item active">
                    Edit {{$category->category_name}}
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12">
                <!-- Edit Category Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-edit me-2"></i>Edit Category
                        </h5>
                        @if($category->status === 1)
                            <span class="badge bg-success status-badge">
                                <i class="fas fa-check-circle me-1"></i> Active
                            </span>
                        @else
                            <span class="badge bg-danger status-badge">
                                <i class="fas fa-times-circle me-1"></i> Inactive
                            </span>
                        @endif
                    </div>
                    <div class="card-body">
                        <form id="editCategoryForm" method="post"
                              action="{{ route('admin.category.update', $category->category_id) }}"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <!-- Basic Information Section -->
                            <div class="form-section">
                                <h6 class="section-title">Basic Information</h6>

                                <!-- Category Name -->
                                <div class="mb-4">
                                    <label for="categoryName" class="form-label">Category Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="categoryName" name="category_name"
                                           value="{{$category->category_name}}">
                                    <div class="form-text">Enter a descriptive name for your category.</div>
                                </div>

                                <!-- Slug (Auto-generated) -->
                                <div class="mb-4">
                                    <label class="form-label">Slug</label>
                                    <input class="form-control" readonly id="slugPreview" name="category_slug"
                                           value="{{$category->category_slug}}">
                                    <div class="form-text d-flex justify-content-between align-items-center mt-1">
                                        <span>This is automatically generated from the category name. Used for URLs.</span>
                                        <div class="btn btn-sm btn-outline-secondary" id="editSlugBtn">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </div>
                                    </div>
                                    <div class="mt-2" id="slugEditContainer" style="display: none;">
                                        <input type="text" class="form-control" id="slugInput" value="">
                                        <div class="form-text">Customize the URL slug for this category.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Section -->
                            <div class="form-section">
                                <h6 class="section-title">Category Image</h6>

                                <div class="mb-3">
                                    <label for="categoryImage" class="form-label">Upload New Image</label>
                                    <input class="form-control" type="file" name="new_category_image" id="categoryImage"
                                           accept="image/*">
                                    <div class="form-text">Upload an image that represents this category. Recommended
                                        size: 300x300px.
                                    </div>
                                </div>
                                <!-- Current Image -->
                                <div class="mb-3">
                                    <label class="form-label">Current Image</label>
                                    <div class="image-preview-container">
                                        <img id="imagePreview" class="image-preview"
                                             src="{{asset('storage/' . $category->category_image)}}"
                                             alt="Current category image">
                                        <input type="hidden" name="current_image" value="{{$category->category_image}}">
                                    </div>
                                </div>
                            </div>

                            <!-- Settings Section -->
                            <div class="form-section">
                                <h6 class="section-title">Settings</h6>
                                <!-- Parent Category Dropdown -->
                                <div class="mb-4">
                                    <label for="parentCategory" class="form-label">Parent Category</label>
                                    <select class="form-select" id="parentCategory" name="parent_id">
                                        <option value="">None (Main Category)</option>
                                        @foreach($categories as $cat)
                                            @if($cat->category_id != $category->category_id)
                                                {{-- Prevent a category from being its own parent --}}
                                                <option value="{{ $cat->category_id }}"
                                                    {{ $cat->category_id == $category->parent_id ? 'selected' : '' }}>
                                                    {{ $cat->category_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Status -->
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="status" id="statusActive"
                                               value="1" @if($category->status ) checked @endif>
                                        <label class="form-check-label" for="statusActive">
                                            <i class="fas fa-circle text-success me-1"></i> Active
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="status" id="statusInactive"
                                               value="0" @if(!$category->status) checked @endif>
                                        <label class="form-check-label" for="statusInactive">
                                            <i class="fas fa-circle text-secondary me-1"></i> Inactive
                                        </label>
                                    </div>
                                    <div class="form-text">Active categories will be visible on your site.</div>
                                </div>

                                <!-- Display Order -->
                                <!--
                             <div class="mb-4">
                                 <label for="displayOrder" class="form-label">Display Order</label>
                                 <input type="number" class="form-control" id="displayOrder" value="1" min="0">
                                 <div class="form-text">Set the order in which this category appears in lists. Lower
                                     numbers appear first.
                                 </div>
                             </div>
                              -->
                            </div>
                            <!-- SEO Section -->
                            <!--           <div class="form-section">
                                       <h6 class="section-title">SEO Settings</h6>


                                <div class="mb-4">
                                    <label for="metaTitle" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="metaTitle"
                                           value="Electronics - Best Deals on Tech Products">
                                    <div class="form-text">Title for search engines. If empty, category name will be
                                        used.
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="metaDescription" class="form-label">Meta Description</label>
                                    <textarea class="form-control" id="metaDescription" rows="2">Find the latest electronics including smartphones, laptops, TVs, and audio equipment at the best prices.</textarea>
                                    <div class="form-text">Description for search engines. If empty, category
                                        description will be used.
                                    </div>
                                </div>
                            </div>
                               -->
                            <!-- Submit Buttons -->
                            <div class="d-flex justify-content-between mt-4">
                                <div>
                                    <button type="button" class="btn btn-outline-danger" id="deleteCategoryBtn">
                                        <i class="fas fa-trash me-1"></i> Delete Category
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-outline-secondary me-2">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Update Category
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            {{--            <div class="col-lg-4">--}}
            <!-- Category Stats Card -->
            <!--  <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Category Statistics</h6>
                 </div>
                 <div class="card-body">
                     <div class="row text-center">
                         <div class="col-6 mb-3">
                             <div class="stats-number">128</div>
                             <div class="stats-text">Products</div>
                         </div>
                         <div class="col-6 mb-3">
                             <div class="stats-number">24</div>
                             <div class="stats-text">Subcategories</div>
                         </div>
                         <div class="col-6">
                             <div class="stats-number">1,254</div>
                             <div class="stats-text">Monthly Views</div>
                         </div>
                         <div class="col-6">
                             <div class="stats-number">86</div>
                             <div class="stats-text">Monthly Sales</div>
                         </div>
                     </div>
                 </div>
             </div>
                -->
            <!-- Recent Activity Card -->
            <!--
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Activity</h6>
                    <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-edit text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="small">Category updated</div>
                                    <div class="text-muted small">2 days ago</div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0 py-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-image text-info"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="small">Image changed</div>
                                    <div class="text-muted small">1 week ago</div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0 py-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-box text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="small">15 products added</div>
                                    <div class="text-muted small">2 weeks ago</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            -->
            <!-- Quick Actions Card -->
            <!--
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-outline-primary text-start">
                                            <i class="fas fa-plus me-2"></i> Add Subcategory
                                        </button>
                                        <button class="btn btn-outline-primary text-start">
                                            <i class="fas fa-box me-2"></i> Manage Products
                                        </button>
                                        <button class="btn btn-outline-primary text-start">
                                            <i class="fas fa-eye me-2"></i> View on Site
                                        </button>
                                        <button class="btn btn-outline-primary text-start">
                                            <i class="fas fa-copy me-2"></i> Duplicate Category
                                        </button>
                                    </div>
                                </div>
                            </div>
                            -->
            {{--            </div>--}}
        </div>
    </div>
@endsection
@section('js')
    <script>
        // edit-category.js
        document.addEventListener('DOMContentLoaded', function () {
            // DOM Elements
            const categoryNameInput = document.getElementById('categoryName');
            const slugPreview = document.getElementById('slugPreview');
            const editSlugBtn = document.getElementById('editSlugBtn');
            const slugEditContainer = document.getElementById('slugEditContainer');
            const slugInput = document.getElementById('slugInput');
            const categoryImageInput = document.getElementById('categoryImage');
            const imagePreview = document.getElementById('imagePreview');
            const removeImageBtn = document.getElementById('removeImageBtn');
            const editCategoryForm = document.getElementById('editCategoryForm');
            const deleteCategoryBtn = document.getElementById('deleteCategoryBtn');
            const cancelBtn = document.querySelector('.btn-outline-secondary');

            // Function to generate slug from category name
            function generateSlug(text) {
                return text
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '')
            }

            // Update slug when category name changes
            categoryNameInput.addEventListener('input', function () {
                const slug = generateSlug(this.value);
                slugPreview.value = slug;
                if (slugEditContainer.style.display !== 'none') {
                    slugInput.value = slug;
                }
            });

            // Show slug edit field
            editSlugBtn.addEventListener('click', function () {
                slugEditContainer.style.display = 'block';
                slugInput.value = slugPreview.value;
                this.style.display = 'none';
            });

            // Handle slug input changes
            slugInput.addEventListener('input', function () {
                const customSlug = generateSlug(this.value);
                slugPreview.value = customSlug;
            });

            // Preview new image when selected
            categoryImageInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    // Validate file type
                    if (!file.type.match('image.*')) {
                        alert('Please select a valid image file.');
                        this.value = '';
                        return;
                    }

                    // Validate file size (max 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('Image size should be less than 5MB.');
                        this.value = '';
                        return;
                    }

                    const reader = new FileReader();

                    reader.addEventListener('load', function () {
                        imagePreview.src = reader.result;
                    });

                    reader.readAsDataURL(file);
                }
            });

            // Remove current image
            removeImageBtn.addEventListener('click', function () {
                if (confirm('Are you sure you want to remove the current image?')) {
                    // Create a hidden input to indicate image removal
                    let removeImageInput = document.querySelector('input[name="remove_image"]');
                    if (!removeImageInput) {
                        removeImageInput = document.createElement('input');
                        removeImageInput.type = 'hidden';
                        removeImageInput.name = 'remove_image';
                        removeImageInput.value = '1';
                        editCategoryForm.appendChild(removeImageInput);
                    }

                    // Set default placeholder image
                    imagePreview.src = 'https://via.placeholder.com/200?text=No+Image';
                    categoryImageInput.value = '';
                }
            });


            // Delete category button
            deleteCategoryBtn.addEventListener('click', function () {
                const categoryName = categoryNameInput.value || 'this category';
            });

            // Initialize character counter for category name
            const nameCounter = document.createElement('div');
            nameCounter.className = 'form-text text-end';
            nameCounter.style.marginTop = '-0.5rem';
            categoryNameInput.parentNode.appendChild(nameCounter);

            function updateNameCounter() {
                const length = categoryNameInput.value.length;
                nameCounter.textContent = `${length}/100 characters`;

                if (length > 80) {
                    nameCounter.className = 'form-text text-end text-warning';
                } else {
                    nameCounter.className = 'form-text text-end';
                }
            }

            categoryNameInput.addEventListener('input', updateNameCounter);
            updateNameCounter();

        });
    </script>
@endsection

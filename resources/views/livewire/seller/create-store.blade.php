<div class="store-creation-container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Create New Store</h4>
            <a href="{{ route('seller.dashboard') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
            </a>
        </div>
        <div class="card-body">
            <!-- Progress Bar -->
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%" id="progressBar"></div>
            </div>
            <!-- Step Indicator -->
            <div class="step-indicator">
                <div class="step {{$current_step === 1 ? 'active' : ''}}" data-step="1">
                    <div class="step-number">1</div>
                    <div class="step-label">Basic Info</div>
                </div>
                <div class="step {{$current_step === 2 ? 'active' : ''}}" data-step="2">
                    <div class="step-number">2</div>
                    <div class="step-label">Store Details</div>
                </div>
                <div class="step {{$current_step === 3 ? 'active' : ''}}" data-step="3">
                    <div class="step-number">3</div>
                    <div class="step-label">Categories</div>
                </div>
                <div class="step {{$current_step === 4 ? 'active' : ''}}" data-step="4">
                    <div class="step-number">4</div>
                    <div class="step-label">Complete</div>
                </div>
            </div>
            <form id="storeCreationForm" wire:submit.prevent="save" enctype="multipart/form-data">
                @csrf

                <!-- Step 1: Basic Information -->
                @if($current_step === 1)
                    <div class="form-step active" id="step1">
                        <h5 class="mb-4">Basic Store Information</h5>

                        <div class="mb-3">
                            <label for="storeName" class="form-label">Store Name <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   wire:model="name"
                                   wire:blur="validateField('name')"
                                   id="storeName"
                                   placeholder="Enter your store name"
                                   value="{{ old('name') }}"
                                   required>
                            <div class="form-text">This will be the public name of your store</div>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="storeSlug" class="form-label">Store URL <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Vendora.com/</span>
                                <input type="text"
                                       class="form-control @error('slug') is-invalid @enderror"
                                       id="storeSlug"
                                       placeholder="your-store-name"
                                       wire:model="slug"
                                       readonly>
                            </div>
                            <div class="form-text">This will be your unique store URL</div>
                            @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="storeDescription" class="form-label">Store Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      wire:model="description" id="storeDescription" rows="3"
                                      placeholder="Describe what your store sells...">{{ old('description') }}</textarea>
                            <div class="form-text">Brief description that appears on your store page</div>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary" wire:click="nextStep">
                                Continue <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                @endif

                @if($current_step === 2)
                    <!-- Step 2: Store Details -->
                    <div class="form-step" id="step2">
                        <h5 class="mb-4">Store Branding & Details</h5>

                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Store Logo</label>
                                <div class="image-upload-area" id="logoUpload">
                                    <div class="upload-icon">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                    <h6>Upload Store Logo</h6>
                                    <p class="text-muted small">Recommended: 200x200px PNG or JPG</p>

                                    <input type="file" wire:model="logo" id="logoInput" accept="image/*">

                                    <img id="logoPreview" class="image-preview @if($logo) show @endif"
                                         src=" @if($logo){{ $logo->temporaryUrl() }}@endif"
                                         alt="logoPreview">
                                </div>
                                @error('logo')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Store Banner</label>
                                <div class="image-upload-area" id="bannerUpload">
                                    <div class="upload-icon">
                                        <i class="fas fa-image"></i>
                                    </div>
                                    <h6>Upload Store Banner</h6>
                                    <p class="text-muted small">Recommended: 1200x300px PNG or JPG</p>

                                    <input type="file" wire:model="banner" id="bannerInput" accept="image/*">
                                    <img id="bannerPreview"
                                         class="image-preview @if($banner) show @endif"
                                         src=" @if($banner){{ $banner->temporaryUrl() }}@endif" alt="bannerPreview">

                                </div>
                                @error('banner') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Contact Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   wire:model="email" id="contactEmail" placeholder="contact@yourstore.com"
                                   value="{{ old('email') }}" required>
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control @error('number') is-invalid @enderror"
                                   wire:model="phone" id="phoneNumber" placeholder="+20 123 456 7890"
                                   value="{{ old('number') }}">
                            @error('number')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="storeAddress" class="form-label">Store Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror"
                                      wire:model="address" id="storeAddress" rows="2"
                                      placeholder="Your business address...">{{ old('store_address') }}</textarea>
                            @error('address')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-outline-secondary me-md-2" wire:click="prevStep()">
                                <i class="fas fa-arrow-left me-2"></i> Back
                            </button>
                            <button type="button" class="btn btn-primary" wire:click="nextStep()">
                                Continue <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                @endif

                @if($current_step === 3)
                    <div class="form-step" id="step3">
                        <h5 class="mb-4">Store Category</h5>
                        <p class="text-muted mb-4">Select the main category that best describes what you'll be
                            selling</p>

                        <div class="mb-4">
                            <label class="form-label fw-bold mb-3">Select Store Category</label>

                            <div class="d-flex flex-wrap gap-3">
                                @foreach($AllCategories as $category)
                                    <div class="category-card
                        {{ $selectedCategory === $category->category_id ? 'selected' : '' }}"
                                         wire:click="selectCategory({{ $category->category_id }})">

                                        <img src="{{ asset('storage/' . $category->category_image) }}"
                                             alt="{{ $category->category_name }}"
                                             class="category-img">

                                        <span class="category-name">{{ $category->category_name }}</span>

                                        <input type="radio"
                                               class="d-none"
                                               value="{{ $category->category_id }}"
                                               wire:model="selectedCategory">
                                    </div>
                                @endforeach
                            </div>

                            @error('selectedCategory')
                            <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-outline-secondary me-md-2" wire:click="prevStep()">
                                <i class="fas fa-arrow-left me-2"></i> Back
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Create Store <i class="fas fa-check ms-2"></i>
                            </button>
                        </div>
                    </div>
                @endif

                @if($current_step === 4)
                    <!-- Step 4: Completion -->
                    <div class="form-step" id="step4">
                        <div class="success-animation">
                            <div class="success-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h5 class="mb-3">Store Created Successfully!</h5>
                            <p class="text-muted mb-4">
                                Our Admin will review your store and approve it within 24 hours.
                            </p>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <button type="button" class="btn btn-primary me-md-2" wire:click="viewStore()">
                                    <i class="fas fa-eye me-2"></i> View Stores
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>


@extends('admin.layouts.layout')
@section('title', 'Edit Attribute')
@section('description')
    Edit existing product attributes to update their details and options.
@endsection
@section('css')
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
    .card {
    border: none;
    border-radius: 0.5rem;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
    margin-bottom: 1.5rem;
    }

    .card-header {
    background-color: #fff;
    border-bottom: 1px solid #e3e6f0;
    padding: 1rem 1.35rem;
    }

    .page-title {
    color: #5a5c69;
    font-weight: 700;
    margin-bottom: 0.5rem;
    }

    .breadcrumb {
    background-color: transparent;
    padding: 0;
    }
    .breadcrumb-item a {
    color: var(--bs-primary);
    text-decoration: none;
    }

    .form-label {
    font-weight: 600;
    color: #5a5c69;
    margin-bottom: 0.5rem;
    }
    .form-check-label,
    .form-check-input{
    cursor: pointer;
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

    .btn-primary {
    background-color: var(--bs-primary);
    border-color: var(--bs-primary);
    }

    .btn-outline-secondary {
    color: #6e707e;
    border-color: #d1d3e2;
    }

    .attribute-values-container {
    border: 1px solid #e3e6f0;
    border-radius: 0.35rem;
    padding: 1rem;
    background-color: #f8f9fc;
    }

    .value-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem;
    border-bottom: 1px solid #e3e6f0;
    }

    .value-item:last-child {
    border-bottom: none;
    }

    .value-text {
    flex: 1;
    }

    .drag-handle {
    cursor: move;
    color: #6e707e;
    }

    .empty-state {
    text-align: center;
    padding: 2rem;
    color: #6e707e;
    }

    .badge-color {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: inline-block;
    border: 2px solid #e3e6f0;
    }

    .color-preview {
    width: 30px;
    height: 30px;
    border-radius: 0.25rem;
    border: 1px solid #d1d3e2;
    }

    .swatch-preview {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.25rem 0.5rem;
    background: #f8f9fc;
    border-radius: 0.25rem;
    border: 1px solid #e3e6f0;
    }
@endsection
@section('admin_layout')
    <div class="container-fluid mt-4">
        <!-- Breadcrumb -->
        <nav aria-label="Breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                >
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.productAttribute.manage') }}">Attributes</a>
                </li>
                >
                <li class="breadcrumb-item active">
                    Create Attribute
                </li>
            </ol>
        </nav>

        <!-- Page Header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="page-title">Create Product Attribute</h1>
                <p class="text-muted">Define a new attribute for your products</p>
            </div>
            <a href="{{ route('admin.productAttribute.manage') }}"
               class="d-none d-sm-inline-block btn btn-outline-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm me-1"></i> Back to Attributes
            </a>
        </div>

        <div class="row">
            <!-- Create Form Column -->
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Attribute Information</h6>
                    </div>
                    <div class="card-body">
                        <form id="createAttributeForm" method="post"
                              action="{{ route('admin.productAttribute.update' , $attribute->attribute_id) }}">
                            @csrf
                            @method('PUT')
                            <!-- Attribute Name -->
                            <div class="mb-4">
                                <label for="attributeName" class="form-label">Attribute Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       value="{{$attribute->name}}" name="name" id="attributeName"
                                       placeholder="e.g., Color, Size, Material">
                                <div class="form-text">Enter a descriptive name for your attribute.</div>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Attribute Code -->
                            <div class="mb-4">
                                <label for="attributeCode" class="form-label">Attribute Code <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       value="{{$attribute->code}}" name="code" id="attributeCode"
                                       placeholder="e.g., color, size, material">
                                <div class="form-text">Unique code used internally. Usually lowercase with
                                    underscores.
                                </div>
                                @error('code')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Attribute Type -->
                            <div class="mb-4">
                                <label for="attributeType" class="form-label">Attribute Type <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="type" id="attributeType">
                                    <option value="select" {{ $attribute->type === 'text' ? 'selected' : '' }}>Input
                                        Text
                                    </option>
                                    <option value="select" {{ $attribute->type === 'number' ? 'selected' : '' }}>Input
                                        Number
                                    </option>
                                    <option value="select" {{ $attribute->type === 'select' ? 'selected' : '' }}>Select
                                        (Dropdown)
                                    </option>
                                    <option value="color" {{ $attribute->type === 'color' ? 'selected' : '' }}>Color
                                        (Swatches)
                                    </option>
                                    <option value="boolean" {{ $attribute->type === 'boolean' ? 'selected' : '' }}>
                                        Yes/No (Boolean)
                                    </option>
                                    <option value="text" {{ $attribute->type === 'price' ? 'selected' : '' }}>price
                                    </option>
                                </select>
                                <div class="form-text">Choose how this attribute will be displayed and used.</div>
                                @error('type')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Attribute's Category -->
                            <div class="mb-4">
                                <label for="category_id" class="form-label">Category <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">
                                        Select Category(General Category)
                                    </option>
                                    @foreach($categories as $category)
                                        {{$category}}
                                        @if($category->category_id === $attribute->category_id)
                                            <option value="{{ $category->category_id }}" selected>
                                                {{ $category->category_name }}
                                            </option>
                                            @break
                                        @endif
                                    @endforeach
                                    @foreach($categories as $category)
                                        {{$category}}
                                        @if($category->category_id !== $attribute->category_id)
                                            <option value="{{ $category->category_id }}">
                                                {{ $category->category_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="form-text">
                                    Choose the category that best describes this attribute.
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="statusActive"
                                           value="1"
                                        {{ $attribute->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="statusActive">
                                        <i class="fas fa-circle text-success me-1"></i> Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="statusInactive"
                                           value="0"
                                        {{ $attribute->status == 0 ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="statusInactive">
                                        <i class="fas fa-circle text-secondary me-1"></i> Inactive
                                    </label>
                                </div>
                                <div class="form-text">
                                    Toggle the status of this attribute to control its visibility in the product
                                    catalog.
                                </div>
                            </div>
                            <!-- Attribute Values (Conditional) -->
                            <!--
                            <div class="mb-4" id="valuesSection" style="display: none;">
                                <label class="form-label">Attribute Values</label>
                                <div class="attribute-values-container">
                                    <div class="empty-state" id="emptyValuesState">
                                        <i class="fa-regular fa-list-ul fa-xl"></i>
                                        <p>No values added yet</p>
                                    </div>
                                    <div id="valuesList"></div>
                                </div>
                                <div class="mt-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="newValueInput"
                                               placeholder="Enter new value">
                                        <button type="button" class="btn btn-outline-primary" id="addValueBtn">
                                            <i class="fas fa-plus me-1"></i> Add Value
                                        </button>
                                    </div>
                                    <div class="form-text">Add possible values for this attribute. Drag to reorder.
                                    </div>
                                </div>
                            </div>
                            -->
                            <!-- Color Options (Conditional) -->
                            <!-- <div class="mb-4" id="colorOptionsSection" style="display: none;">
                                 <label class="form-label">Color Options</label>
                                 <div class="attribute-values-container">
                                     <div class="empty-state" id="emptyColorsState">
                                         <i class="fa-regular fa-palette"></i>
                                         <p>No color options added yet</p>
                                     </div>
                                     <div id="colorsList"></div>
                                 </div>
                                 <div class="mt-3">
                                     <div class="row g-2">
                                         <div class="col-md-6">
                                             <input type="text" class="form-control" id="newColorName"
                                                    placeholder="Color name">
                                         </div>
                                         <div class="col-md-4">
                                             <input type="color" class="form-control form-control-color"
                                                    id="newColorValue" value="#4e73df">
                                         </div>
                                         <div class="col-md-2">
                                             <button type="button" class="btn btn-outline-primary w-100"
                                                     id="addColorBtn">
                                                 <i class="fa-regular fa-plus"></i>
                                             </button>
                                         </div>
                                     </div>
                                     <div class="form-text">Add color options with names and hex values.</div>
                                 </div>
                             </div>
                             -->
                            <!-- Submit Buttons -->
                            <div class="d-flex gap-2 justify-content-end mt-5">
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Update Attribute
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="col-lg-4">
                <!-- Help Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">About Attributes</h6>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted">
                            Product attributes define the characteristics of your products. They help customers filter
                            and compare products.
                        </p>
                        <div class="mt-3">
                            <h6 class="small fw-bold">Common Attribute Types:</h6>
                            <ul class="small text-muted ps-3">
                                <li><strong>Select:</strong> Dropdown with predefined options</li>
                                <li><strong>Color:</strong> Visual color swatches</li>
                                <li><strong>Text:</strong> Simple text input</li>
                                <li><strong>Yes/No:</strong> Boolean true/false values</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.productAttribute.manage') }}"
                               class="btn btn-outline-primary text-start">
                                <i class="fas fa-list me-2"></i> Manage Attributes
                            </a>
                            <!--
                            <button class="btn btn-outline-primary text-start">
                                 <i class="fas fa-copy me-2"></i> Duplicate Attribute
                             </button>
                             -->
                            <!-- <button class="btn btn-outline-primary text-start">
                                 <i class="fas fa-question-circle me-2"></i> View Documentation
                             </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('admin_asset/js/create-attributes.js')}}"></script>
@endsection

@extends('admin.layouts.layout')
@section('title', 'Manage Categories')
@section('description')
    Manage existing categories and organize products.
@endsection
@section('css')
    .card-header {
    background-color: #fff;
    border-bottom: 1px solid #e3e6f0;
    padding: 1rem 1.35rem;
    }

    .table th {
    border-top: none;
    font-weight: 600;
    color: #6e707e;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    }

    .status-badge {
    padding: 0.35em 0.65em;
    font-size: 0.75em;
    font-weight: 600;
    }

    .category-img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 0.35rem;
    }

    .action-btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    border-radius: 0.2rem;
    }

    .search-box {
    position: relative;
    }

    .search-box .form-control {
    padding-left: 2.5rem;
    }

    .search-box i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #b7b9cc;
    }

    .page-title {
    color: #5a5c69;
    font-weight: 700;
    margin-bottom: 0.5rem;
    }

    .stats-card {
    border-left: 4px solid;
    }
    .stats-number {
    font-size: 1.5rem;
    font-weight: 700;
    }

    .stats-text {
    font-size: 0.8rem;
    color: #5a5c69;
    }

@endsection
@section('admin_layout')
    <!-- Main Content -->
    <div class="container-fluid mt-4">
        <!-- Page Header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="page-title">Categories Management</h1>
            <a href="{{ route('admin.category.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 me-1"></i> Add New Category
            </a>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stats-card primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stats-text text-uppercase">Total Categories</div>
                                <div class="stats-number">{{count($categories)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-folder fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stats-card success h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stats-text text-uppercase">Active Categories</div>
                                <div class="stats-number">{{$activeCategories}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stats-card danger h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stats-text text-uppercase">Inactive Categories</div>
                                <div class="stats-number">{{$inactiveCategories}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Table Card -->
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                <div class="mt-2 mt-md-0 d-flex flex-column flex-md-row gap-2">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" placeholder="Search categories...">
                    </div>
                    <select class="form-select">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th width="15%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $cat)
                            <tr>
                                <td>{{$cat->category_id}}</td>
                                <td>
                                    <img src="{{asset('storage/' . $cat->category_image)}}" loading="lazy"
                                         alt="{{ $cat->category_name}}" class="category-img">
                                </td>
                                <td>
                                    <strong>{{ \Str::ucfirst($cat->category_name)}}</strong>
                                </td>
                                <td>{{ ($cat->category_slug)}}</td>
                                <td>128</td>
                                <td>
                                    @if($cat->status)
                                        <span class="badge bg-success status-badge">
                                            Active
                                    </span>
                                    @else
                                        <span class="badge bg-danger status-badge">
                                            Inactive
                                    </span>
                                    @endif
                                </td>
                                <td>{{\Carbon\Carbon::parse($cat->create_at)->format('M d, Y')}}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit' , $cat->category_slug) }}" class="btn btn-sm btn-outline-primary action-btn">
                                        <i class="align-middle" data-feather="edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger action-btn">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary action-btn">
                                        <i class="align-middle" data-feather="eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    {{ $categories->withQueryString()->onEachSide(1)->links('components.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

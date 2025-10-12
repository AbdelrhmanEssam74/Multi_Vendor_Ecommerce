@extends('admin.layouts.layout')
@section('title', 'Manage Attribute')
@section('description')
    Manage product attributes including creation, editing, deletion, and bulk actions.
@endsection
@section('css')
    .navbar-custom {
    background-color: var(--bs-primary);
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
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
    color: var(--bs-primary);
    font-weight: 700;
    margin-bottom: 0.5rem;
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

    .stats-card {
    border-left: 4px solid;
    }

    .stats-card.primary {
    border-left-color: var(--bs-primary);
    }

    .stats-card.success {
    border-left-color: var(--success-color);
    }

    .stats-card.warning {
    border-left-color: var(--warning-color);
    }

    .stats-card.danger {
    border-left-color: var(--bs-danger);
    }

    .stats-number {
    font-size: 1.5rem;
    font-weight: 700;
    }

    .stats-text {
    font-size: 0.8rem;
    color: #5a5c69;
    }

    .type-badge {
    font-size: 0.7rem;
    padding: 0.3em 0.6em;
    }

    .values-preview {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    }

    .color-swatch {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    display: inline-block;
    border: 1px solid #e3e6f0;
    margin-right: 4px;
    }

    .bulk-actions {
    background-color: #f8f9fc;
    border: 1px solid #e3e6f0;
    border-radius: 0.35rem;
    padding: 1rem;
    margin-bottom: 1rem;
    }

    .filter-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 0.5rem;
    }

    .filter-tag {
    background-color: #e3e6f0;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    }
    .action-btns{
    display: flex;
    gap: 0.5rem;
    }
@endsection
@section('admin_layout')
    <!-- Main Content -->
    <div class="container-fluid mt-4">
        <!-- Page Header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="page-title">Manage Product Attributes</h1>
            <a href="{{ route('admin.productAttribute.create') }}"
               class="d-none d-sm-inline-block btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 me-1"></i> Create New Attribute
            </a>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stats-card primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="stats-text text-uppercase">Total Attributes</div>
                                <div class="stats-number">{{count($attributes)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tags fa-2x text-gray-300"></i>
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
                                <div class="stats-text text-uppercase">Active Attributes</div>
                                <div class="stats-number">{{$ActiveAttributes}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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
                                <div class="stats-text text-uppercase">InActive Attributes</div>
                                <div class="stats-number">{{$inActiveAttributes}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attributes Table Card -->
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h6 class="m-0 font-weight-bold text-primary">All Attributes</h6>
                <div class="mt-2 mt-md-0 d-flex flex-column flex-md-row gap-2">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" placeholder="Search attributes..." id="searchInput">
                    </div>
                    <select class="form-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <select class="form-select" id="typeFilter">
                        <option value="">All Types</option>
                        <option value="select">Select</option>
                        <option value="multiselect">Multiselect</option>
                        <option value="text">Text</option>
                        <option value="color">Color</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <!-- Active Filters -->
                <div class="filter-tags" id="activeFilters"></div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>Attribute Name</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th width="12%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!count($attributes))
                            <tr>
                                <td colspan="7" class="text-center">No attributes found.</td>
                            </tr>
                        @endif
                        @foreach($attributes as $attribute)
                            <tr>
                                <td>{{$attribute->attribute_id}}</td>
                                <td>
                                    <strong>{{$attribute->name}}</strong>
                                </td>
                                <td>{{$attribute->code}}</td>
                                <td>
                                    <span class="badge bg-info type-badge">{{$attribute->type}}</span>
                                </td>
                                <td>128</td>
                                <td>
                                    @if($attribute->status)
                                        <span class="badge bg-success status-badge">
                                            Active
                                    </span>
                                    @else
                                        <span class="badge bg-danger status-badge">
                                            Inactive
                                        </span>

                                    @endif
                                </td>
                                <td class="action-btns">
                                    <a href="{{ route('admin.productAttribute.edit' , $attribute->attribute_id) }}"
                                       class="btn btn-sm btn-outline-primary action-btn" title="Edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger action-btn" title="Delete">
                                        <i class="fa-regular fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
            </div>
        </div>
    </div>
@endsection

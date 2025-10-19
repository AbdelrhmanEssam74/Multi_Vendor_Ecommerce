@extends('seller.layouts.layout')
@section('title', 'manage store ')
@section('description')
    Manage your stores, monitor performance, and handle orders all in one place.
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('seller_asset/css/manage_stores.css') }}">
@endsection
@section('seller_layout')
    <div class="container-fluid">
        <!-- Simple Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1>Manage Your Stores</h1>
                    <p>Monitor performance and manage all your stores in one place</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('seller.store.create') }}" class="btn btn-new-store">
                        <i class="fas fa-plus me-2"></i> New Store
                    </a>
                </div>
            </div>
        </div>

        <!-- Simple Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">3</div>
                <div class="stat-label">Active Stores</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">156</div>
                <div class="stat-label">Total Orders</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">2.4K</div>
                <div class="stat-label">Monthly Views</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">4.8</div>
                <div class="stat-label">Average Rating</div>
            </div>
        </div>

        <!-- Simple Search -->
        <div class="search-section">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search stores by name..." id="storeSearch">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="filter-select w-100" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="filter-select w-100" id="performanceFilter">
                        <option value="">All Performance</option>
                        <option value="excellent">Excellent</option>
                        <option value="good">Good</option>
                        <option value="poor">Poor</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-filter w-100">
                        <i class="fas fa-filter me-2"></i> Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- Simple Store Cards -->
        <div class="store-grid">
            <!-- Store Card 1 -->
            <div class="store-card">
                <div class="store-banner">
                    <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Fashion Store Banner">
                    <div class="store-logo">
                        <img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Fashion Store Logo">
                    </div>
                </div>
                <div class="store-content">
                    <h3 class="store-name">Fashion Haven</h3>
                    <p class="store-description">Latest fashion trends and accessories for modern individuals. Quality clothing with style.</p>

                    <div class="store-meta">
                        <div class="meta-item">
                            <i class="fas fa-box"></i>
                            <span>45 Products</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-shopping-cart"></i>
                            <span>89 Orders</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-star"></i>
                            <span>4.9</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="store-status status-active">
                            <i class="fas fa-circle"></i> Active
                        </span>
                        <span class="text-muted small">Jan 15, 2024</span>
                    </div>

                    <div class="store-actions">
                        <button class="btn-action primary" onclick="viewStore(1)">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn-action" onclick="editStore(1)">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action" onclick="manageProducts(1)">
                            <i class="fas fa-cube"></i> Products
                        </button>
                    </div>
                </div>
            </div>

            <!-- Store Card 2 -->
            <div class="store-card">
                <div class="store-banner">
                    <img src="https://images.unsplash.com/photo-1556656793-08538906a9f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Tech Store Banner">
                    <div class="store-logo">
                        <img src="https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Tech Store Logo">
                    </div>
                </div>
                <div class="store-content">
                    <h3 class="store-name">Tech Gadgets Pro</h3>
                    <p class="store-description">Latest electronics, smartphones, and tech accessories. Innovation at your fingertips.</p>

                    <div class="store-meta">
                        <div class="meta-item">
                            <i class="fas fa-box"></i>
                            <span>67 Products</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-shopping-cart"></i>
                            <span>34 Orders</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-star"></i>
                            <span>4.6</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="store-status status-active">
                            <i class="fas fa-circle"></i> Active
                        </span>
                        <span class="text-muted small">Mar 8, 2024</span>
                    </div>

                    <div class="store-actions">
                        <button class="btn-action primary" onclick="viewStore(2)">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn-action" onclick="editStore(2)">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action" onclick="manageProducts(2)">
                            <i class="fas fa-cube"></i> Products
                        </button>
                    </div>
                </div>
            </div>

            <!-- Create Store Card -->
            <div class="store-card">
                <div class="create-store-card" onclick="createNewStore()">
                    <div class="create-store-icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <h4>Create New Store</h4>
                    <p>Start a new selling journey with another store</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <div class="action-card" onclick="viewAnalytics()">
                <div class="action-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h5>Store Analytics</h5>
                <p>View detailed performance reports</p>
            </div>
            <div class="action-card" onclick="manageOrders()">
                <div class="action-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h5>Order Management</h5>
                <p>Process and track all orders</p>
            </div>
            <div class="action-card" onclick="viewCustomers()">
                <div class="action-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h5>Customer Insights</h5>
                <p>Understand your customer base</p>
            </div>
            <div class="action-card" onclick="storeSettings()">
                <div class="action-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <h5>Store Settings</h5>
                <p>Configure store preferences</p>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection

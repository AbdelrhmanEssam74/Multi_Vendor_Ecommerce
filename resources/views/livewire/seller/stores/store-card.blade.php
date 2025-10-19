<div class="store-card">
    <div class="store-banner">
        @if(!$banner)
            <img
                src="https://api.dicebear.com/9.x/initials/png?seed={{$storeName}}"
                alt="Fashion Store Banner">
        @else
            <img src="{{ asset('storage/' . $banner) }}" alt="Fashion Store Banner">
        @endif
        <div class="store-logo">
            @if(!$logo)
                <img src="https://api.dicebear.com/9.x/initials/png?seed={{$storeName}}" alt="Fashion Store Logo">
            @else
                <img src="{{ asset('storage/' . $logo) }}" alt="Fashion Store Logo">
            @endif
        </div>
    </div>
    <div class="store-content">
        <h3 class="store-name">{{$store->name}}</h3>
        <p class="store-description">
            {{  Str::limit($store->description, 100, '...') }}
        </p>

        <div class="store-meta">
            <div class="meta-item">
                <i class="fas fa-box"></i>
                <span>0 Products</span>
            </div>
            <div class="meta-item">
                <i class="fas fa-shopping-cart"></i>
                <span>0 Orders</span>
            </div>
            <div class="meta-item">
                <i class="fas fa-star"></i>
                <span>0</span>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            @if($store->status===1)
                <span class="store-status status-active">
                            <i class="fas fa-circle"></i> Active
                        </span>
            @else
                <span class="store-status status-inactive">
                            <i class="fas fa-circle"></i> Inactive
                        </span>
            @endif
            <span class="text-muted small">{{\Carbon\Carbon::parse($store->created_at)->format('M d, Y')}}</span>
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

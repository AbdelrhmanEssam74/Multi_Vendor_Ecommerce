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

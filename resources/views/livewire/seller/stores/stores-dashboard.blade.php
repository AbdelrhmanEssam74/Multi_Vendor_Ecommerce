<div class="container-fluid">
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
    {{--  state section  --}}
    <livewire:seller.stores.stats-section :total-stores="$activeStores" />
    {{--  filer section  --}}
    <livewire:seller.stores.filter-section/>
    {{--  stores grid section  --}}
    <livewire:seller.stores.store-grid/>
    {{--  quick action  --}}
    <livewire:seller.stores.quick-actions/>
</div>

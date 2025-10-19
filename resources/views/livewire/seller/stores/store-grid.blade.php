<div class="store-grid">
    @foreach($stores as $store)
        <livewire:seller.stores.store-card :store="$store"/>
    @endforeach
    <!-- Create Store Card -->
    <div class="store-card">
        <div class="create-store-card" wire:click="createNewStore()">
            <div class="create-store-icon">
                <i class="fas fa-plus-circle"></i>
            </div>
            <h4>Create New Store</h4>
            <p>Start a new selling journey with another store</p>
        </div>
    </div>
</div>

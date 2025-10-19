<?php

namespace App\Livewire\Seller\Stores;

use Livewire\Component;

class StoreCard extends Component
{
    public $store;
    public $storeName, $logo, $banner;
    public $stores = [];

    public function mount($store)
    {
        if ($this->store) {
            $this->store = $store;
            $this->storeName = $store->name;
            $this->logo = $store->logo;
            $this->banner = $store->banner;
        }
    }

    public function render()
    {
        return view('livewire.seller.stores.store-card');
    }
}

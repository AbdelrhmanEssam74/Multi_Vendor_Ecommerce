<?php

namespace App\Livewire\Seller\Stores;

use App\Models\Store;
use Livewire\Component;

class StoresDashboard extends Component
{
    public $activeStores;

    public function mount()
    {
        $this->activeStores = Store::where('status', 1)->count();
    }

    public function render()
    {
        return view('livewire.seller.stores.stores-dashboard');
    }
}

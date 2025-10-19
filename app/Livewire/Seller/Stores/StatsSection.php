<?php

namespace App\Livewire\Seller\Stores;

use Livewire\Component;

class StatsSection extends Component
{
    public $totalStores;
    public function render()
    {
        return view('livewire.seller.stores.stats-section');
    }
}

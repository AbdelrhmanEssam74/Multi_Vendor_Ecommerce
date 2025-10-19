<?php

namespace App\Livewire\Seller\Stores;

use App\Models\Store;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class StoreGrid extends Component
{



    public function mount()
    {
        $seller = Auth::user()->seller;

        if ($seller) {
            $this->stores = Store::where('seller_id', $seller->seller_id)->get();
        }
    }

    public function createNewStore()
    {
        return redirect()->route('seller.store.create');
    }

    public function render()
    {
        return view('livewire.seller.stores.store-grid', [
            'stores' => $this->stores
        ]);
    }
}

<?php

namespace App\Livewire\Seller;

use App\Models\Store;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateStore extends Component
{
    use WithFileUploads;

    public $current_step = 1;
    public $AllCategories;
    public $seller_id, $name, $slug, $description, $logo, $banner, $email, $phone, $address, $category_id, $status;
    public $selectedCategory = null;
    public $logoPath = null;
    public $bannerPath = null;
    // create the store in multiple steps
    // define validation rules for each step
    protected $rulesStep1 = [
        'name' => 'required|string|max:255|unique:stores,name',
        'slug' => 'required|string|max:255|unique:stores,slug',
        'description' => 'nullable|string|max:1000',
    ];
    protected $rulesStep2 = [
        'email' => 'required|email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'logo' => 'nullable|image|max:2048',
        'banner' => 'nullable|image|max:4096',
    ];

    protected $rulesStep3 = [
        'selectedCategory' => 'required|exists:categories,category_id',
    ];

    public function nextStep()
    {
        if ($this->current_step === 1) {
            $this->validate($this->rulesStep1);
        } elseif ($this->current_step === 2) {
            $this->validate($this->rulesStep2);
        } elseif ($this->current_step === 3) {
            $this->validate($this->rulesStep3);
        }
        if ($this->current_step < 4) {
            $this->current_step++;
        }
    }

    public function prevStep()
    {
        if ($this->current_step > 1) {
            $this->current_step--;
        }
    }

// generate slug from name
    public function updatedName($value)
    {
        $this->slug = Str::slug($value, '-');
    }

    public function updatedSlug($value)
    {
        $exists = Store::where('slug', $value)->exists();

        if ($exists) {
            $this->addError('slug', 'This store URL is already taken.');
        } else {
            $this->resetErrorBag('slug');
        }
    }

    protected $rules = [
        'name' => 'required|string|max:255|unique:stores,name',
        'slug' => 'required|string|max:255|unique:stores,slug',
        'description' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        'email' => 'nullable|email|max:255|unique:stores,email',
        'phone' => 'required|string|max:11',
        'address' => 'nullable|string',
        'selectedCategory' => 'required|exists:categories,category_id',
    ];


    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
    }

    public function validateField($field)
    {
        $this->validateOnly($field);
    }

    public function mount($allCategories)
    {
        $this->AllCategories = $allCategories;
    }

    public function render()
    {
        return view('livewire.seller.create-store');
    }

    public function save()
    {
        $this->validate();

        // Store the logo and banner file, image path -> public/storage/stores/seller_id/
        if ($this->logo) {
            $this->logoPath = $this->logo->store('stores/logos', 'public');
        }

        if ($this->banner) {
            $this->bannerPath = $this->banner->store('stores/banners', 'public');
        }
        Store::create([
            'seller_id' => auth()->user()->seller->seller_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'logo' => $this->logoPath,
            'banner' => $this->bannerPath,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'category_id' => $this->selectedCategory,
        ]);
        $this->current_step = 4;
    }
    public function viewStore()
    {
     return redirect()->route('seller.store.manage');
    }
}

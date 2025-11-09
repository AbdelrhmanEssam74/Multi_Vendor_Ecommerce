<?php

namespace App\Filament\Seller\Resources\ProductsResource\Pages;

use App\Filament\Seller\Resources\ProductsResource;
use App\Models\Attributes;
use App\Models\Product_attribute_value;
use Filament\Resources\Pages\CreateRecord;

class CreateProducts extends CreateRecord
{
    protected static string $resource = ProductsResource::class;

    public array $attributeValues = [];
    protected function  getRedirectUrl(): string
    {
        return self::getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['seller_id'] = auth()->user()->seller->seller_id;

        return $data;
    }
    protected function afterCreate(): void
    {
        $product = $this->record;

        foreach ($this->attributeValues as $attributeId => $value) {
            if (!empty($value)) {
                Product_attribute_value::create([
                    'product_id'   => $product->product_id,
                    'attribute_id' => $attributeId,
                    'value'        => $value,
                ]);
            }
        }
    }



    public function getAttributesList(): array
    {

        $categoryId = $this->data['category_id'] ?? null;

        if (!$categoryId) {
            return [];
        }

        return Attributes::query()
            ->where(function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId)
                    ->orWhereNull('category_id');
            })
            ->where('status', 1)
            ->get()
            ->map(fn($attr) => [
                'id'   => $attr->attribute_id,
                'name' => $attr->name,
                'code' => $attr->code,
                'placeholder' => $attr->placeholder,
                'helper' => $attr->helper_text,
            ])
            ->toArray();
    }
}

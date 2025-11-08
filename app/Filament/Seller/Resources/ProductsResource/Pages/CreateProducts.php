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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // إنشاء المنتج
        $product = static::$resource::getModel()::create($data);

        // حفظ القيم الخاصة بالـ Attributes
        foreach ($this->attributeValues as $attributeId => $value) {
            if (!empty($value)) {
                Product_attribute_value::create([
                    'product_id'   => $product->product_id,
                    'attribute_id' => $attributeId,
                    'value'        => $value,
                ]);
            }
        }

        return $data;
    }

    // ✅ جلب الـ Attributes بناءً على الفئة المختارة
    public function getAttributesList(): array
    {
        // نحاول الحصول على الـ category_id من بيانات النموذج
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
                'type' => $attr->type ?? 'text',
            ])
            ->toArray();
    }
}

<?php

namespace App\Filament\Seller\Resources\ProductsResource\Pages;

use App\Filament\Seller\Resources\ProductsResource;
use App\Models\Attributes;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProducts extends EditRecord
{
    protected static string $resource = ProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function  getRedirectUrl(): string
    {
        return self::getResource()::getUrl('index');
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

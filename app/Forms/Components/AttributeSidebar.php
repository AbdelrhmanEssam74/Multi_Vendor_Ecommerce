<?php

namespace App\Forms\Components;

use App\Models\Attributes;
use Filament\Forms\Components\Field;

class AttributeSidebar extends Field
{
    protected string $view = 'forms.components.attribute-sidebar';

    protected $categoryIdCallback = null;

    public function categoryId($callback): static
    {
        $this->categoryIdCallback = $callback;
        return $this;
    }

    public function getAttributesList(): array
    {
        // ✅ استدعاء الكولباك بشكل آمن
        $categoryId = is_callable($this->categoryIdCallback)
            ? call_user_func($this->categoryIdCallback, $this->getLivewire())
            : null;

        logger('Category ID:', [$categoryId]);

        if (!$categoryId) {
            return [];
        }

        $attributes = Attributes::query()
            ->where(function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId)
                    ->orWhereNull('category_id');
            })
            ->where('status', 1)
            ->get()
            ->map(fn($attr) => [
                'id' => $attr->attribute_id,
                'name' => $attr->name,
                'code' => $attr->code,
                'type' => $attr->type ?? 'text',
            ])
            ->toArray();

        logger('Attributes:', $attributes);

        return $attributes;
    }
}

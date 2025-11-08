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
                    ->orWhere('category_id' , 5);
            })
            ->where('status', 1)
            ->get()
            ->map(fn($attr) => [
                'id' => $attr->attribute_id,
                'name' => $attr->name,
                'code' => $attr->code,
                'helper' => $attr->helper_text,
                'placeholder' => $attr->placeholder,
            ])
            ->toArray();

        logger('Attributes:', $attributes);

        return $attributes;
    }
}

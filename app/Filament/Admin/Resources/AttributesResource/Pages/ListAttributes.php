<?php

namespace App\Filament\Admin\Resources\AttributesResource\Pages;

use App\Filament\Admin\Resources\AttributesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttributes extends ListRecords
{
    protected static string $resource = AttributesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

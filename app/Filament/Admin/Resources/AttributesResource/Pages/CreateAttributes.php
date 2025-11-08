<?php

namespace App\Filament\Admin\Resources\AttributesResource\Pages;

use App\Filament\Admin\Resources\AttributesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAttributes extends CreateRecord
{
    protected static string $resource = AttributesResource::class;

    protected function getRedirectUrl(): string
    {
        return self::getResource()::getUrl('index');
    }
}

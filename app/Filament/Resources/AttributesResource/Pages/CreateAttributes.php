<?php

namespace App\Filament\Resources\AttributesResource\Pages;

use App\Filament\Resources\AttributesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAttributes extends CreateRecord
{
    protected static string $resource = AttributesResource::class;

    protected function getRedirectUrl(): string
    {
        return self::getResource()::getUrl('index');
    }
}

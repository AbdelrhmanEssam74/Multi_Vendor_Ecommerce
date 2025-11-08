<?php

namespace App\Filament\Admin\Resources\AttributesResource\Pages;

use App\Filament\Admin\Resources\AttributesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAttributes extends EditRecord
{
    protected static string $resource = AttributesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return self::getResource()::getUrl('index');
    }
}

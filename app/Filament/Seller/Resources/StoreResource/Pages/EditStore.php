<?php

namespace App\Filament\Seller\Resources\StoreResource\Pages;

use App\Filament\Seller\Resources\StoreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStore extends EditRecord
{
    protected static string $resource = StoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->modalHeading(fn ($record) => 'Delete ' . $record->title)
                ->modalDescription('Are you sure you want to delete this store? This action cannot be undone, and all products associated with this store will be removed.'),
        ];
    }
    protected function  getRedirectUrl(): string
    {
        return self::getResource()::getUrl('index');
    }

}

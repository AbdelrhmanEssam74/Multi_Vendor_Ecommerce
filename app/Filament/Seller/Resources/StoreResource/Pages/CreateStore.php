<?php

namespace App\Filament\Seller\Resources\StoreResource\Pages;

use App\Filament\Seller\Resources\StoreResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStore extends CreateRecord
{
    protected static string $resource = StoreResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['seller_id'] = auth()->user()->seller->seller_id;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return self::getResource()::getUrl('index');
    }
}

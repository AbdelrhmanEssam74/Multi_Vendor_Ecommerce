<?php

namespace App\Filament\Seller\Resources\StoreResource\Pages;

use App\Filament\Seller\Resources\StoreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\CreateAction;

class ListStores extends ListRecords
{
    protected static string $resource = StoreResource::class;
    protected function getActions(): array
    {
        $canCreate = auth()->user()->seller->stores()->count() < 1;

        return [
            CreateAction::make()
                ->disabled(!$canCreate)
                ->tooltip($canCreate ? '' : 'You can only create up to 5 stores.'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

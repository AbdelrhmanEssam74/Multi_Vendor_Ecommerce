<?php

namespace App\Filament\Seller\Resources\ProductsResource\Pages;

use App\Filament\Seller\Resources\ProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProducts extends CreateRecord
{
    protected static string $resource = ProductsResource::class;
}

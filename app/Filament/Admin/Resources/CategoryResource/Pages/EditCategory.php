<?php

namespace App\Filament\Admin\Resources\CategoryResource\Pages;

use App\Filament\Admin\Resources\CategoryResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->using(function ($record) {
                    if ($record->hasChildren()) {
                        Notification::make()
                            ->title("Can't delete '{$record->category_name}' because it has subcategories.")
                            ->danger()
                            ->send();
                        return;
                    }
                    $record->delete();
                    Notification::make()
                        ->title("Category '{$record->category_name}' deleted successfully.")
                        ->success()
                        ->send();
                }),
        ];
    }
}

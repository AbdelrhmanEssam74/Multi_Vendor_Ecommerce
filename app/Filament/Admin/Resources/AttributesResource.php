<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttributesResource\Pages;
use App\Filament\Resources\AttributesResource\RelationManagers;
use App\Models\Attributes;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class AttributesResource extends Resource
{
    protected static ?string $model = Attributes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Attribute Details')->schema([
                    TextInput::make('name')
                        ->label('Attribute Name')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('code', Str::slug($state))),
                    TextInput::make('code')
                        ->label('Attribute Code')
                        ->required()
                        ->readOnly()
                        ->helperText('This code is auto-generated from the attribute name.')
                        ->unique(ignoreRecord: true),
                    Select::make('category_id')
                        ->label('Category')
                        ->options(Category::all()->pluck('category_name', 'category_id'))
                        ->helperText('Select the category this attribute belongs to.')
                        ->required(),
                ])->columnSpan(2),
                Section::make('Settings')->schema([
                    Radio::make('status')
                        ->label('Status')
                        ->options([
                            1 => 'Active',
                            0 => 'Inactive',
                        ])
                        ->default(1)
                        ->required(),
                ])->columnSpan(1),
            ])->columns(3);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Attribute Name')->sortable()->searchable(),
                TextColumn::make('code')->label('Attribute Code')->sortable()->searchable(),
                TextColumn::make('category.category_name')->label('Category')->sortable()->searchable(),
                TextColumn::make('products_count')->label('Products')->counts('products')->sortable(),
                TextColumn::make('created_by')->label('Created By')->sortable()->searchable(),
                BooleanColumn::make('status')->label('Active')->trueIcon('heroicon-o-check-circle')->falseIcon('heroicon-o-x-circle')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
                    ->using(function ($record) {
                        if ($record->hasProduct()) {
                            Notification::make()
                                ->title('Attribute "' . $record->name . '" cannot be deleted because it is associated with products.')
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->using(function ($records) {
                            foreach ($records as $record) {
                                if ($record->hasProduct()) {
                                    Notification::make()
                                        ->title('Attribute "' . $record->name . '" cannot be deleted because it is associated with products.')
                                        ->danger()
                                        ->send();
                                    continue;
                                }
                                $record->delete();

                                Notification::make()
                                    ->title("Attribute '{$record->name}' deleted successfully.")
                                    ->success()
                                    ->send();
                            }

                        }),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttributes::route('/'),
            'create' => Pages\CreateAttributes::route('/create'),
            'edit' => Pages\EditAttributes::route('/{record}/edit'),
        ];
    }
}

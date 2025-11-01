<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\ProductsResource\Pages;
use App\Filament\Seller\Resources\ProductsResource\RelationManagers;
use App\Models\Category;
use App\Models\products;
use App\Models\Store;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductsResource extends Resource
{
    protected static ?string $model = products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Basic Info')->schema([
                        TextInput::make('name')
                            ->label('Product Name')
                            ->unique(ignoreRecord: true)
                            ->live()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => ($set('slug', Str::slug($state))))
                            ->placeholder('Enter product name')
                            ->helperText('Choose a clear and descriptive name for your product'),
                        TextInput::make('slug')
                            ->label('Product Slug')
                            ->readOnly()
                            ->helperText('This will be auto-generated from the product name.')
                            ->unique(ignoreRecord: true),
                        Textarea::make('description')
                            ->label('Product Description')
                            ->helperText('Write a short description about your product.'),
                    ]),
                    Wizard\Step::make('Product Details')->schema([
                        Select::make('store_id')
                            ->label(' Store ')
                            ->searchable()
                            ->required()
                            ->live()
                            ->options(Store::where('seller_id', auth()->user()->seller->seller_id)
                                ->pluck('name', 'store_id')
                                ->prepend('Select Store')),
                        Select::make('category_id')
                            ->label('Select Category')
                            ->hidden(fn(Get $get): bool => !$get('store_id'))
                            ->searchable()
                            ->required()
                            // get the category name from the category_id from the store data
                            ->options(function (Get $get) {
                                $storeId = $get('store_id');
                                if (!$storeId) {
                                    return [];
                                }
                                $store = Store::find($storeId);
                                if (!$store) {
                                    return [];
                                }
                                return Category::where('category_id', $store->category_id)
                                    ->pluck('category_name', 'category_id');
                            })
                    ]),
                ])
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}

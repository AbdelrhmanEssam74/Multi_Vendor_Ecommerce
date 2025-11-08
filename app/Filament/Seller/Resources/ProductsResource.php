<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\ProductsResource\Pages;
use App\Filament\Seller\Resources\ProductsResource\RelationManagers;
use App\Forms\Components\AttributeSidebar;
use App\Models\Attributes;
use App\Models\product;
use App\Models\Store;
use Filament\Forms\Components\{Grid,
    Hidden,
    Placeholder,
    Repeater,
    Section,
    Wizard,
    TextInput,
    Textarea,
    Select,
    FileUpload};
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductsResource extends Resource
{
    protected static ?string $model = product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Basic Info')
                        ->icon('heroicon-o-information-circle')
                        ->schema([
                            TextInput::make('name')
                                ->label('Product Name')
                                ->unique(ignoreRecord: true)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug',
                                    Str::of($state)
                                        ->replace(' ', '-')
                                        ->lower()
                                )
                                )
                                ->placeholder('Enter product name')
                                ->helperText('Choose a clear and descriptive name for your product')
                                ->required(),

                            TextInput::make('slug')
                                ->label('Product Slug')
                                ->readOnly()
                                ->unique(ignoreRecord: true)
                                ->helperText('This will be auto-generated from the product name.'),

                            Textarea::make('description')
                                ->label('Product Description')
                                ->rows(4)
                                ->placeholder('Write a short description about your product...')
                                ->helperText('This helps customers understand what your product offers.'),
                        ])
                        ->columns(1),
                    Wizard\Step::make('Product Details')
                        ->icon('heroicon-o-rectangle-stack')
                        ->schema([
                            Grid::make(2)->schema([
                                Hidden::make('seller_id')
                                ->default(auth()->user()->seller->seller_id)
                                    ,
                                Select::make('store_id')
                                    ->label('Store')
                                    ->searchable()
                                    ->required()
                                    ->live()
                                    ->options(
                                        Store::where('seller_id', auth()->user()->seller->seller_id)
                                            ->pluck('name', 'store_id')
                                    )
                                    ->placeholder('Select Store'),

                                Select::make('category_id')
                                    ->label('Select Category')
                                    ->live()
                                    ->reactive()
                                    ->required()
                                    ->options(fn(Get $get) => Store::find($get('store_id'))
                                        ?->categories()
                                        ->pluck('categories.category_name', 'categories.category_id')
                                        ->toArray() ?? [])
                            ]),
                            Section::make('Attributes')->schema([
                                AttributeSidebar::make('attributes')
                                    ->label('Attributes')
                                    ->categoryId(fn($livewire) => $livewire->data['category_id'] ?? null)
                                    ->visible(fn(Get $get) => filled($get('category_id')))
                                    ->columnSpan('full'),
                            ])->collapsible()->collapsed(false),
                        ]),
                    Wizard\Step::make('Pricing')
                        ->icon('heroicon-o-currency-dollar')
                        ->schema([
                            TextInput::make('price')
                                ->label('Price')
                                ->numeric()
                                ->prefix('EGP')
                                ->required()
                                ->placeholder('0.00')
                                ->helperText('Enter the selling price for this product.'),
                        ])
                        ->columns(1),

                    Wizard\Step::make('Images')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            FileUpload::make('main_image')
                                ->label('Main Image')
                                ->image()
                                ->imagePreviewHeight('200')
                                ->imageEditor()
                                ->directory('products/main')
                                ->required()
                                ->helperText('Upload the main product image. Recommended 1080x1080.'),

                            FileUpload::make('gallery')
                                ->label('Gallery Images')
                                ->image()
                                ->multiple()
                                ->imagePreviewHeight('150')
                                ->reorderable()
                                ->directory('products/gallery')
                                ->helperText('Upload multiple images that best represent your product.'),
                        ])
                        ->columns(2),

                    Wizard\Step::make('Status')
                        ->icon('heroicon-o-check-circle')
                        ->schema([
                            Select::make('status')
                                ->label('Product Status')
                                ->options([
                                    1 => 'Active',
                                    0 => 'Inactive',
                                ])
                                ->default(1)
                                ->required()
                                ->helperText('Inactive products will not appear in your store.'),
                        ])
                        ->columns(1),
                ])
                    ->columnSpanFull()
            ])
            ->columns(1);
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

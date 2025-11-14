<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\ProductsResource\Pages;
use App\Filament\Seller\Resources\ProductsResource\RelationManagers;
use App\Forms\Components\AttributeSidebar;
use App\Models\Attributes;
use App\Models\Product;
use App\Models\Store;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\{Grid,
    Hidden,
    Placeholder,
    Repeater,
    Section,
    Wizard,
    TextInput,
    Textarea,
    Select,
    FileUpload
};
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductsResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Information')
                    ->description('Enter main details about your product')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Product Name')
                                ->unique(ignoreRecord: true)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(Set $set, ?string $state) =>
                                $set('slug', Str::of($state)->replace(' ', '-')->lower())
                                )
                                ->placeholder('Enter product name')
                                ->helperText('Choose a clear and descriptive name for your product')
                                ->required(),

                            TextInput::make('slug')
                                ->label('Slug')
                                ->unique(ignoreRecord: true)
                                ->placeholder('Auto generated from name')
                                ->helperText('You can edit it manually if needed.'),
                        ]),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(4)
                            ->placeholder('Write a short description about your product...'),
                    ]),

                Section::make('Store & Category')
                    ->description('Select where this product belongs')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('store_id')
                                ->label('Store')
                                ->searchable()
                                ->helperText('Select the store where this product belongs.')
                                ->required()
                                ->live()
                                ->options(
                                    Store::where('seller_id', auth()->user()->seller->seller_id)
                                        ->pluck('name', 'store_id')
                                )
                                ->placeholder('Select Store'),

                            Select::make('category_id')
                                ->label('Category')
                                ->helperText('Select the category this product belongs to.')
                                ->live()
                                ->reactive()
                                ->required()
                                ->options(fn(Get $get) => Store::find($get('store_id'))
                                    ?->categories()
                                    ->pluck('categories.category_name', 'categories.category_id')
                                    ->toArray() ?? []),
                        ]),
                    ]),

                Section::make('Attributes')
                    ->schema([
                        AttributeSidebar::make('attributes')
                            ->label('Attributes')
                            ->categoryId(fn($livewire) => $livewire->data['category_id'] ?? null)
                            ->visible(fn(Get $get) => filled($get('category_id')))
                            ->columnSpan('full'),
                    ])
                    ->collapsible()
                    ->collapsed(false),

                Section::make('Pricing & Stock')
                    ->description('Set product pricing and stock details')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('price')
                                ->label('Price')
                                ->helperText('Enter the price of your product in EGP')
                                ->numeric()
                                ->prefix('EGP')
                                ->required(),

                            TextInput::make('discount')
                                ->label('Discount (%)')
                                ->numeric()
                                ->helperText('Enter the discount percentage for your product')
                                ->default(0)
                                ->minValue(0)
                                ->maxValue(100),

                            TextInput::make('tax_rate')
                                ->label('Tax Rate (%)')
                                ->numeric()
                                ->helperText('Enter the tax rate for your product')
                                ->default(0)
                                ->minValue(0)
                                ->maxValue(100),
                        ]),

                        Grid::make(2)->schema([
                            Select::make('stock_status')
                                ->label('Stock Status')
                                ->options([
                                    'in_stock' => 'In Stock',
                                    'out_of_stock' => 'Out of Stock',
                                    'pre_order' => 'Pre-Order',
                                ])
                                ->helperText('Select the stock status for your product')
                                ->default('in_stock')
                                ->required(),

                            TextInput::make('stock')
                                ->label('Stock Quantity')
                                ->numeric()
                                ->helperText('Enter the stock quantity for your product')
                                ->default(0)
                                ->required(),
                        ]),
                    ]),

                Section::make('SEO & Visibility')
                    ->description('Improve how your product appears in search results')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->placeholder('Title for SEO (optional)')
                                ->helperText('Enter a title that is clear and descriptive')
                                ->maxLength(60),

                            TextInput::make('meta_description')
                                ->label('Meta Description')
                                ->placeholder('Short SEO description (optional)')
                                ->helperText('Enter a short description that is clear and concise')
                                ->maxLength(160),
                        ]),

                        Select::make('visibility')
                            ->label('Visibility')
                            ->options([
                                1 => 'Public',
                                0 => 'Private',
                            ])
                            ->default('public')
                            ->helperText('Select the visibility of your product')
                            ->required(),
                    ]),

                Section::make('Images')
                    ->schema([
                        FileUpload::make('main_image')
                            ->label('Main Image')
                            ->image()
                            ->imagePreviewHeight('200')
                            ->helperText('Upload the main image for your product.')
                            ->directory('products/main')
                            ->imageEditor()
                            ->required(),

                        FileUpload::make('gallery')
                            ->label('Gallery Images')
                            ->image()
                            ->multiple()
                            ->imagePreviewHeight('150')
                            ->directory('products/gallery')
                            ->reorderable()
                            ->helperText('You can upload multiple images.'),
                    ])
                    ->columns(2),

                Section::make('Status')
                    ->schema([
                        Select::make('status')
                            ->label('Product Status')
                            ->options([
                                1 => 'Active',
                                0 => 'Inactive',
                            ])
                            ->default(1)
                            ->helperText('Select the status of your product.')
                            ->required(),
                    ]),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('main_image')
                    ->label('Main Image')
                    ->width(50),
                TextColumn::make('name')
                    ->label('Product Name')
                    ->searchable()
                    ->limit(20)
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->limit(10)
                    ->sortable(),
                TextColumn::make('store.name')
                    ->label('Store')
                    ->searchable(),
                TextColumn::make('price')
                    ->label('Price')
                    ->money('EGP')
                    ->sortable(),
                TextColumn::make('stock')
                    ->label('Stock')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state == 1 ? 'Active' : 'Inactive')
                    ->color(fn($state) => $state == 1 ? 'success' : 'danger'),
                TextColumn::make('visibility')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state == 1 ? 'Visible' : 'Invisible')
                    ->color(fn($state) => $state == 1 ? 'success' : 'danger'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->requiresConfirmation()
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

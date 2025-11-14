<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\StoreResource\Pages;
use App\Filament\Seller\Resources\StoreResource\RelationManagers;
use App\Models\Category;
use App\Models\Store;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class StoreResource extends Resource
{
    protected static ?string $model = Store::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Basic Info')
                        ->schema([
                            TextInput::make('name')
                                ->unique(ignoreRecord: true)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                ->label('Store Name')
                                ->helperText('This name will be visible to your customers.')
                                ->required(),
                            TextInput::make('slug')
                                ->prefix('vendora.com/')
                                ->unique(ignoreRecord: true)
                                ->label('Store Slug')
                                ->readOnly()
                                ->helperText(' This will be auto-generated from the store name.')
                                ->required(),
                            Textarea::make('description')
                                ->helperText('Write a short description about your store.')
                        ]),
                    Wizard\Step::make('Store Details')
                        ->schema([
                            Group::make()->schema([
                                FileUpload::make('logo')
                                    ->label('Store Logo')
                                    ->helperText('Upload your store logo. Recommended size: 1080x1080 pixels.')
                                    ->image()
                                    ->required(),
                                FileUpload::make('banner')
                                    ->label('Store Banner')
                                    ->helperText('Upload your store Banner. Recommended size: 1920*1080 pixels.')
                                    ->image()
                                    ->required(),
                            ])->columns(2),
                            Group::make()->schema([
                                TextInput::make('phone')
                                    ->label('Contact Phone')
                                    ->prefix('+20')
                                    ->placeholder('1234567890')
                                    ->tel()
                                    ->helperText('Enter a contact phone number for your store.')
                                    ->required(),
                                TextInput::make('email')
                                    ->label('Contact Email')
                                    ->placeholder('contact@gmail.com')
                                    ->email()
                                    ->helperText('Enter a contact email address for your store.')
                                    ->required(),
                            ])->columns(1),
                        ]),
                    Wizard\Step::make('Categories')
                        ->schema([
                            Select::make('Categories')
                                ->label('Categories')
                                ->multiple()
                                ->relationship('categories', 'category_name')
                                ->preload()
                                ->required(),
                        ]),
                ])->columnSpan(1)
            ])->columns(1);
    }

    public static function canCreate(): bool
    {
        $seller = auth()->user()->seller;
        return $seller->stores()->count() < 3;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo')
                    ->width(50),
                TextColumn::make('name')
                    ->label('Store Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('slug')
                    ->label('Store Url')
                    ->limit(5)
                    ->prefix(config('app.name') . '.com/')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Store Number')
                    ->prefix('+20 ')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Store Email')
                    ->limit(20)
                    ->searchable(),
                TextColumn::make('categories.category_name')
                    ->label('Categories')
                    ->badge()
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state == 1 ? 'Active' : 'Inactive')
                    ->color(fn($state) => $state == 1 ? 'success' : 'danger'),
                TextColumn::make('created_at')
                    ->date()
                    ->sortable(),
            ])
            ->searchPlaceholder('Search (Name, Slug, Phone, Email, Categories)')
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()->modalHeading(fn($record) => 'Delete ' . $record->title)
                    ->modalDescription('Are you sure you want to delete this store? This action cannot be undone, and all products associated with this store will be removed.'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->modalDescription('Are you sure you want to delete this store? This action cannot be undone, and all products associated with this store will be removed.'),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('seller_id', auth()->user()->seller->seller_id);
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
            'index' => Pages\ListStores::route('/'),
            'create' => Pages\CreateStore::route('/create'),
            'edit' => Pages\EditStore::route('/{record}/edit'),
        ];
    }
}

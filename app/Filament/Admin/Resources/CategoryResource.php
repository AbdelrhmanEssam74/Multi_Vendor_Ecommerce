<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use function Livewire\before;
use function Symfony\Component\Translation\t;
use Filament\Notifications\Notification;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        // ['category_name','category_slug','status','category_image','parent_id'];
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('category_name')
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('category_slug', Str::slug($state)))
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Enter category name')
                        ->helperText('Enter the name of the category.'),
                    TextInput::make('category_slug')
                        ->readOnly()
                        ->helperText('This will be auto-generated from the category name.'),
                    Select::make('parent_id')
                        ->label('Parent Category')
                        ->options(
                            Category::whereNull('parent_id')
                                ->pluck('category_name', 'category_id')
                        )
                        ->searchable()
                        ->placeholder('Select parent category (optional)'),
                ])->columnSpan(2),
                Group::make()->schema([
                    Section::make('Image')
                        ->collapsible()
                        ->schema([
                            FileUpload::make('category_image')
                                ->label('Category Image')
                                ->disk('public')
                                ->directory('categories')
                                ->visibility('public')
                                ->image()
                                ->imagePreviewHeight('150')
                                ->enableDownload()
                                ->getUploadedFileNameForStorageUsing(function ($file) {
                                    return (string)str()->uuid() . '.' . $file->getClientOriginalExtension();
                                }),
                        ])->columnSpan(1),
                    Section::make()->schema([
                        Radio::make('status')
                            ->default(1)
                            ->options([
                                1 => 'Active',
                                0 => 'Inactive',
                            ])
                            ->required()
                    ])
                ]),


            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('category_image')
                    ->label('Image')
                    ->width(50),
                TextColumn::make('category_name')
                    ->label('Category Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category_slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state == 1 ? 'Active' : 'Inactive')
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
                Tables\Actions\DeleteAction::make()
                    ->using(function ($record) {
                        if ($record->children()->exists()) {
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
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->using(function ($records) {
                        foreach ($records as $record) {
                            if ($record->children()->exists()) {
                                Notification::make()
                                    ->title("Can't delete '{$record->category_name}' because it has subcategories.")
                                    ->danger()
                                    ->send();
                                continue;
                            }

                            $record->delete();

                            Notification::make()
                                ->title("Category '{$record->category_name}' deleted successfully.")
                                ->success()
                                ->send();
                        }
                    }),


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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}

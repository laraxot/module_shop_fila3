<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Modules\Shop\Filament\Resources\CategoryResource\Pages\CreateCategory;
use Modules\Shop\Filament\Resources\CategoryResource\Pages\EditCategory;
use Modules\Shop\Filament\Resources\CategoryResource\Pages\ListCategories;
use Modules\Shop\Filament\Resources\CategoryResource\RelationManagers\ProductsRelationManager;
use Modules\Shop\Models\Category;
use SevendaysDigital\FilamentNestedResources\Columns\ChildResourceLink;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                // ->live()
                // ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required(),
                Checkbox::make('is_hidden'),
                // CuratorPicker::make('featured_image_id')
                //     ->relationship('featuredImage', 'id')
                //     ->imageResizeTargetWidth('10'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                IconColumn::make('is_hidden')->boolean(),
                // CuratorColumn::make('featured_image')
                //     ->size(40),
                ChildResourceLink::make(ProductResource::class),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->reorderable('order_column')
            ->defaultSort('order_column');
    }

    public static function getRelations(): array
    {
        return [
            ProductsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCategories::route('/'),
            'create' => CreateCategory::route('/create'),
            'edit' => EditCategory::route('/{record}/edit'),
        ];
    }
}

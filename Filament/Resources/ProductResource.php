<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Shop\Filament\Resources\ProductResource\Pages\CreateProduct;
use Modules\Shop\Filament\Resources\ProductResource\Pages\EditProduct;
use Modules\Shop\Filament\Resources\ProductResource\Pages\ListProducts;
use Modules\Shop\Filament\Resources\ProductResource\RelationManagers\SubproductsRelationManager;
use Modules\Shop\Models\Product;
use SevendaysDigital\FilamentNestedResources\NestedResource;

class ProductResource extends NestedResource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getParent(): string
    {
        return CategoryResource::class;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                // ->live()
                // ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required(),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('weight')->default(0)->required(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('€'),
                // CuratorPicker::make('featured_image_id')
                //     ->relationship('featuredImage', 'id')
                //     ->imageResizeTargetWidth('10'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('weight'),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                // CuratorColumn::make('featured_image')
                //     ->size(40),
                // ChildResourceLink::make(ProductResource::class),
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
            SubproductsRelationManager::class,
            // VariationsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}

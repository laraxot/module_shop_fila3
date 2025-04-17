<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Shop\Filament\Resources\ProductMorphResource\Pages\CreateProductMorph;
use Modules\Shop\Filament\Resources\ProductMorphResource\Pages\EditProductMorph;
use Modules\Shop\Filament\Resources\ProductMorphResource\Pages\ListProductMorphs;
use Modules\Shop\Models\ProductMorph;
use SevendaysDigital\FilamentNestedResources\Columns\ChildResourceLink;
use SevendaysDigital\FilamentNestedResources\NestedResource;

class ProductMorphResource extends NestedResource
{
    protected static ?string $model = ProductMorph::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getParent(): string
    {
        return CategoryResource::class;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                /*Forms\Components\TextInput::make('model_type')
                    ->maxLength(255),
                Forms\Components\TextInput::make('model_id')
                    ->numeric(),
                Forms\Components\TextInput::make('product_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user_id')
                    ->numeric(),
                Forms\Components\TextInput::make('option')
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->maxLength(255),*/
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ChildResourceLink::make(ProductResource::class),
                /*Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('model_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('option')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),*/
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
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProductMorphs::route('/'),
            'create' => CreateProductMorph::route('/create'),
            'edit' => EditProductMorph::route('/{record}/edit'),
        ];
    }
}

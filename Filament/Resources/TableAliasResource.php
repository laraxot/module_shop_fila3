<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Shop\Filament\Resources\TableAliasResource\Pages\CreateTableAlias;
use Modules\Shop\Filament\Resources\TableAliasResource\Pages\EditTableAlias;
use Modules\Shop\Filament\Resources\TableAliasResource\Pages\ListTableAliases;
use Modules\Shop\Models\Table as TableAlias;

class TableAliasResource extends Resource
{
    protected static ?string $model = TableAlias::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            'index' => ListTableAliases::route('/'),
            'create' => CreateTableAlias::route('/create'),
            'edit' => EditTableAlias::route('/{record}/edit'),
        ];
    }
}

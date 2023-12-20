<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\TableAliasResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Shop\Filament\Resources\TableAliasResource;

class EditTableAlias extends EditRecord
{
    protected static string $resource = TableAliasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\TableAliasResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Shop\Filament\Resources\TableAliasResource;

class ListTableAliases extends ListRecords
{
    protected static string $resource = TableAliasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

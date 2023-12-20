<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\TableAliasResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Shop\Filament\Resources\TableAliasResource;

class CreateTableAlias extends CreateRecord
{
    protected static string $resource = TableAliasResource::class;
}

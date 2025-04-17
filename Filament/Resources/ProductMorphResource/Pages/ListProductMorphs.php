<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\ProductMorphResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Shop\Filament\Resources\ProductMorphResource;

class ListProductMorphs extends ListRecords
{
    protected static string $resource = ProductMorphResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

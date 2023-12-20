<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\ProductMorphResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Shop\Filament\Resources\ProductMorphResource;

class EditProductMorph extends EditRecord
{
    protected static string $resource = ProductMorphResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

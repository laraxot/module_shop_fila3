<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Shop\Filament\Resources\ProductResource;

// use SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;

class EditProduct extends EditRecord
{
    // use NestedPage;

    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

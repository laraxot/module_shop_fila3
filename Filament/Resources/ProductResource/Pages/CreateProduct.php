<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\ProductResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Shop\Filament\Resources\ProductResource;

// use SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;

class CreateProduct extends CreateRecord
{
    // use NestedPage;
    protected static string $resource = ProductResource::class;
}

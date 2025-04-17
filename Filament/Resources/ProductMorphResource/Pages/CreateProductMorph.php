<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\ProductMorphResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Shop\Filament\Resources\ProductMorphResource;

class CreateProductMorph extends CreateRecord
{
    protected static string $resource = ProductMorphResource::class;
}

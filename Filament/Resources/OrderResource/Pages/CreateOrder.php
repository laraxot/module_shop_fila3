<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\OrderResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Shop\Filament\Resources\OrderResource;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}

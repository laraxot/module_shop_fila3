<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\AgendaResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Shop\Filament\Resources\AgendaResource;

class CreateAgenda extends CreateRecord
{
    protected static string $resource = AgendaResource::class;
}

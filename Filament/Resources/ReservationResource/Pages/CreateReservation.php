<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\ReservationResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Shop\Filament\Resources\ReservationResource;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;
}

<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\ReservationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Shop\Filament\Resources\ReservationResource;
use Modules\Shop\Filament\Resources\ReservationResource\Widgets\CalendarWidget;

class ListReservations extends ListRecords
{
    protected static string $resource = ReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            CalendarWidget::class,
        ];
    }
}

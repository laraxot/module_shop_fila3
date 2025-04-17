<?php

declare(strict_types=1);

namespace Modules\Shop\Filament\Resources\AgendaResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Shop\Filament\Resources\AgendaResource;

class EditAgenda extends EditRecord
{
    protected static string $resource = AgendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

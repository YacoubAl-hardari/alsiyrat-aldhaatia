<?php

namespace App\Filament\Resources\CounterResource\Pages;

use App\Filament\Resources\CounterResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCounter extends ViewRecord
{
    protected static string $resource = CounterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

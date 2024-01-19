<?php

namespace App\Filament\Resources\ClientLogoResource\Pages;

use App\Filament\Resources\ClientLogoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClientLogo extends ViewRecord
{
    protected static string $resource = ClientLogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

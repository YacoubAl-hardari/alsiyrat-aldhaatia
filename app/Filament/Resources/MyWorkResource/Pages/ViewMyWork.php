<?php

namespace App\Filament\Resources\MyWorkResource\Pages;

use App\Filament\Resources\MyWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMyWork extends ViewRecord
{
    protected static string $resource = MyWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\MyWorkCategoryResource\Pages;

use App\Filament\Resources\MyWorkCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMyWorkCategory extends ViewRecord
{
    protected static string $resource = MyWorkCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

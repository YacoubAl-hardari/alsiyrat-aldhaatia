<?php

namespace App\Filament\Resources\MyWorkResource\Pages;

use App\Filament\Resources\MyWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyWorks extends ListRecords
{
    protected static string $resource = MyWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

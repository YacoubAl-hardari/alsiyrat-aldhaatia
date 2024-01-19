<?php

namespace App\Filament\Resources\ContacFormResource\Pages;

use App\Filament\Resources\ContacFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContacForms extends ListRecords
{
    protected static string $resource = ContacFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

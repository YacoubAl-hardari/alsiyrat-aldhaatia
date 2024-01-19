<?php

namespace App\Filament\Resources\MyWorkCategoryResource\Pages;

use App\Filament\Resources\MyWorkCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyWorkCategories extends ListRecords
{
    protected static string $resource = MyWorkCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

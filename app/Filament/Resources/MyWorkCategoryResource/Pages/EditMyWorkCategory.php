<?php

namespace App\Filament\Resources\MyWorkCategoryResource\Pages;

use App\Filament\Resources\MyWorkCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyWorkCategory extends EditRecord
{
    protected static string $resource = MyWorkCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\MyWorkResource\Pages;

use App\Filament\Resources\MyWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyWork extends EditRecord
{
    protected static string $resource = MyWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

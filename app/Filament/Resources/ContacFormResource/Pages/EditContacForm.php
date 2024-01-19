<?php

namespace App\Filament\Resources\ContacFormResource\Pages;

use App\Filament\Resources\ContacFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContacForm extends EditRecord
{
    protected static string $resource = ContacFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

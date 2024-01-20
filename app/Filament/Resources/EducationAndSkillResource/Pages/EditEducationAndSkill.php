<?php

namespace App\Filament\Resources\EducationAndSkillResource\Pages;

use App\Filament\Resources\EducationAndSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationAndSkill extends EditRecord
{
    protected static string $resource = EducationAndSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\EducationAndSkillResource\Pages;

use App\Filament\Resources\EducationAndSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEducationAndSkill extends ViewRecord
{
    protected static string $resource = EducationAndSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

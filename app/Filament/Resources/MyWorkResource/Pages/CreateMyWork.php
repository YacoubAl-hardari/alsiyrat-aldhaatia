<?php

namespace App\Filament\Resources\MyWorkResource\Pages;

use App\Filament\Resources\MyWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyWork extends CreateRecord
{
    protected static string $resource = MyWorkResource::class;
}

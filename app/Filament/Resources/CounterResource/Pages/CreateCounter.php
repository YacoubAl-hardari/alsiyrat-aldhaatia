<?php

namespace App\Filament\Resources\CounterResource\Pages;

use App\Filament\Resources\CounterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCounter extends CreateRecord
{
    protected static string $resource = CounterResource::class;
}

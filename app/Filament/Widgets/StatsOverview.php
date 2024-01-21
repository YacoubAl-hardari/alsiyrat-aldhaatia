<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\MyWork;
use App\Models\MyWorkCategory;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('المستخدمين', User::query()->count())
            ->description('كل المستخدمين')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 8, 17])
            ->color('info'),

            Stat::make('المشاريع', MyWork::query()->count())
            ->description('كافة المشاريع')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),

            Stat::make('أقسام المشاريع', MyWorkCategory::query()->count())
            ->description('كافة أقسام المشاريع')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('primary'),

            
        ];
    }
}

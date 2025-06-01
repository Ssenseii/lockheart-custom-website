<?php

namespace App\Filament\Widgets;

use App\Models\ProductOrder;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductOrdersOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Orders', ProductOrder::count())
                ->description('All product orders')
                ->descriptionIcon('heroicon-o-shopping-bag')
                ->color('primary'),

            Stat::make('Orders Today', ProductOrder::whereDate('created_at', today())->count())
                ->description('New orders today')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success'),

            Stat::make('Total Quantity', ProductOrder::sum('quantity'))
                ->description('Total products ordered')
                ->descriptionIcon('heroicon-o-cube')
                ->color('info'),
        ];
    }
}

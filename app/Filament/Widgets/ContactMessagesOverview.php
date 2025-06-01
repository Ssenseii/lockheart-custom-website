<?php

namespace App\Filament\Widgets;

use App\Models\ContactMessage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContactMessagesOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Messages', ContactMessage::count())
                ->description('All contact messages')
                ->descriptionIcon('heroicon-o-envelope')
                ->color('primary'),

            Stat::make('Messages Today', ContactMessage::whereDate('created_at', today())->count())
                ->description('New messages today')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success'),

            Stat::make('Avg. Messages/Month', round(ContactMessage::where('created_at', '>=', now()->subMonth())->count() / 30, 1))
                ->description('Average per day')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('info'),
        ];
    }
}

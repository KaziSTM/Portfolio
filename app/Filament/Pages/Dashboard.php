<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;

class Dashboard extends BaseDashboard
{
    protected function getHeaderActions(): array
    {
        return [
            Action::make('viewSite')
                ->label('View Home Page')
                ->icon(Heroicon::OutlinedGlobeAlt)
                ->color('primary')
                ->url(route('home', ['locale' => app()->getLocale()])),
        ];
    }
}

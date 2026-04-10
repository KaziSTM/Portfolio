<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CareerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Career')
                    ->schema([
                        TextEntry::make('position'),
                        TextEntry::make('company.name')
                            ->label('Company'),
                        TextEntry::make('duration'),
                        TextEntry::make('description')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}

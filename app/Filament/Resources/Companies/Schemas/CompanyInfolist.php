<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CompanyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Company')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('logo')
                            ->collection('logo')
                            ->label('Logo'),
                        TextEntry::make('name'),
                        TextEntry::make('slug'),
                        TextEntry::make('industry'),
                        TextEntry::make('headquarter'),
                        TextEntry::make('size'),
                        TextEntry::make('website')
                            ->url(fn ($record) => $record->website),
                    ])
                    ->columns(2),
            ]);
    }
}

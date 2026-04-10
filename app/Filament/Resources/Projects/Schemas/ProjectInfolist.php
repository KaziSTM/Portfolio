<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('logo')
                            ->collection('logo')
                            ->label('Logo'),
                        TextEntry::make('name'),
                        TextEntry::make('slug'),
                        TextEntry::make('company.name')
                            ->label('Company'),
                        TextEntry::make('type'),
                        IconEntry::make('is_featured')
                            ->boolean(),
                        IconEntry::make('is_in_progress')
                            ->boolean(),
                        TextEntry::make('start')
                            ->date(),
                        TextEntry::make('end')
                            ->date(),
                        TextEntry::make('link')
                            ->url(fn ($record) => $record->link),
                        TextEntry::make('header')
                            ->columnSpanFull(),
                        TextEntry::make('description')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}

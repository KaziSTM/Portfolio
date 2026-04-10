<?php

namespace App\Filament\Resources\Careers\Schemas;

use App\Models\Company;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CareerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Career')
                    ->schema([
                        Select::make('company_id')
                            ->label('Company')
                            ->options(fn (): array => Company::query()
                                ->get()
                                ->mapWithKeys(fn (Company $company): array => [
                                    $company->id => $company->getTranslation('name', app()->getLocale(), true),
                                ])
                                ->all())
                            ->searchable()
                            ->required(),
                        TextInput::make('position')
                            ->numeric()
                            ->default(0)
                            ->required(),
                        TextInput::make('duration')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('description')
                            ->rows(8)
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}

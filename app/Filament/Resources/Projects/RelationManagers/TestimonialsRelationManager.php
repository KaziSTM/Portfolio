<?php

namespace App\Filament\Resources\Projects\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\RelationManagers\Concerns\Translatable;
use Livewire\Attributes\Reactive;

class TestimonialsRelationManager extends RelationManager
{
    use Translatable;

    protected static string $relationship = 'testimonials';

    #[Reactive]
    public ?string $activeLocale = null;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('author_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('author_role')
                    ->maxLength(255),
                TextInput::make('rating')
                    ->numeric()
                    ->default(5)
                    ->required(),
                TextInput::make('avatar')
                    ->maxLength(255),
                Textarea::make('content')
                    ->rows(5)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('author_name')
            ->columns([
                TextColumn::make('author_name')
                    ->searchable(),
                TextColumn::make('author_role')
                    ->limit(30),
                TextColumn::make('rating'),
            ])
            ->filters([
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

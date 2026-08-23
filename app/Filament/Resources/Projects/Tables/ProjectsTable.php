<?php

namespace App\Filament\Resources\Projects\Tables;

use App\Models\Project;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('position', 'asc')
            ->reorderable('position')
            ->columns([
                TextColumn::make('position')
                    ->label('Order')
                    ->sortable(),
                SpatieMediaLibraryImageColumn::make('logo')
                    ->collection('logo')
                    ->label('Logo')
                    ->square(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('company.name')
                    ->label('Company')
                    ->searchable(),
                TextColumn::make('type')
                    ->badge(),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                IconColumn::make('is_featured')
                    ->boolean(),
                IconColumn::make('is_in_progress')
                    ->boolean(),
                TextColumn::make('start')
                    ->date()
                    ->sortable(),
                TextColumn::make('end')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('toggleActive')
                    ->label(fn (Project $record): string => $record->is_active ? 'Disable' : 'Enable')
                    ->icon(fn (Project $record) => $record->is_active ? Heroicon::OutlinedEyeSlash : Heroicon::OutlinedEye)
                    ->color(fn (Project $record): string => $record->is_active ? 'danger' : 'success')
                    ->action(function (Project $record): void {
                        $record->update(['is_active' => ! $record->is_active]);
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Actions\DeleteAction;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    use Translatable;

    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function afterFill(): void
    {
        $this->form->fill([
            ...$this->form->getState(),
            'main_tags' => $this->record->mainTags()->pluck('name')->all(),
            'tech_tags' => $this->record->techTags()->pluck('name')->all(),
        ]);
    }

    protected function afterSave(): void
    {
        $this->record->syncTagsWithType($this->data['main_tags'] ?? [], 'main');
        $this->record->syncTagsWithType($this->data['tech_tags'] ?? [], 'tech');
    }
}

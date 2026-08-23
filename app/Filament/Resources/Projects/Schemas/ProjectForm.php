<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Enums\ProjectRole;
use App\Enums\ProjectType;
use App\Models\Project;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project')
                    ->schema([
                        Select::make('company_id')
                            ->relationship('company', 'name')
                            ->label('Company')
                            ->searchable(),
                        TextInput::make('slug')
                            ->required()
                            ->unique(Project::class, 'slug', ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Select::make('type')
                            ->options(collect(ProjectType::cases())
                                ->mapWithKeys(fn (ProjectType $type): array => [$type->value => $type->label()])
                                ->all())
                            ->required(),
                        TextInput::make('header')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                        MarkdownEditor::make('details')
                            ->columnSpanFull(),
                        TextInput::make('link')
                            ->url()
                            ->maxLength(255),
                        DatePicker::make('start'),
                        DatePicker::make('end'),
                        TextInput::make('position')
                            ->label('Order')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_featured'),
                        Toggle::make('is_in_progress'),
                        CheckboxList::make('main_tags')
                            ->options(collect(ProjectRole::cases())
                                ->mapWithKeys(fn (ProjectRole $role): array => [$role->value => $role->label()])
                                ->all())
                            ->columns(3)
                            ->columnSpanFull(),
                        TagsInput::make('tech_tags')
                            ->columnSpanFull(),
                        SpatieMediaLibraryFileUpload::make('logo')
                            ->collection('logo')
                            ->image()
                            ->maxFiles(1)
                            ->columnSpanFull(),

                        SpatieMediaLibraryFileUpload::make('main')
                            ->collection('main')
                            ->image()
                            ->maxFiles(1)
                            ->columnSpanFull(),
                        SpatieMediaLibraryFileUpload::make('images')
                            ->collection('images')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}

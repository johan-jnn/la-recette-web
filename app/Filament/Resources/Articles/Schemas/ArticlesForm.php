<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Experience;
use Filament\Actions\AttachAction;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticlesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label("Titre")
                    ->required(),
                TextInput::make('description')
                    ->label("Description")
                    ->maxLength(1024)
                    ->required(),
                RichEditor::make('body')
                    ->label("Contenu")
                    ->columnSpanFull()
                    ->required(),

                Select::make('experience')
                    ->label("Experience associée")
                    ->hint("Selectionnez une expérience si cet article peut être utilisé pour présenter cette expérience.")
                    ->relationship(titleAttribute: 'title')
                    ->searchable()
                    ->preload()
                    ->columnSpanFull()
            ]);
    }
}

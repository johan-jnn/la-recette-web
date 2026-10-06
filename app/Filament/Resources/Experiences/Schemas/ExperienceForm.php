<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->label('Titre')->columnSpanFull(),
                RichEditor::make('presentation')->required()->label('Presentation')->columnSpanFull(),
                Checkbox::make('use_luma_event')->label('Associer un event Luma ?')->live(),
                TextInput::make('luma_event_id')->label('Identifiant Luma')->columnSpanFull()
                    ->hidden(fn (Get $get) => ! $get('use_luma_event')),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Experience;
use Filament\Actions\AttachAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Str;

class ArticlesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('thumbnail_url')
                    ->label("Illustration")
                    ->required()
                    ->columnSpanFull()
                    ->image()
                    ->optimize()
                    ->imageEditor()
                    ->automaticallyCropImagesToAspectRatio()
                    ->moveFiles()
                    ->getUploadedFileNameForStorageUsing(fn(Get $get) => Str::slug($get('title')))
                    ->disk('public')
                    ->visibility('public')
                    ->directory('articles/thumbnails')
                    ->imageAspectRatio('16:9'),

                Section::make('Article')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
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
                    ]),

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

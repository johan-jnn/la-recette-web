<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Str;

class ExperienceForm
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
                    ->getUploadedFileNameForStorageUsing(fn(Get $get) => Str::slug($get('title')))
                    ->moveFiles()
                    ->disk('public')
                    ->visibility('public')
                    ->directory('experiences/thumbnails')
                    ->imageAspectRatio('16:9'),

                Section::make("Détails de l'expérience")
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->label('Titre')
                            ->columnSpanFull(),
                        RichEditor::make('presentation')
                            ->required()
                            ->label('Presentation')
                            ->columnSpanFull(),

                        FileUpload::make('slider_images_url')
                            ->label('Images du slider')
                            ->default('[]')
                            ->multiple()
                            ->image()
                            ->optimize()
                            ->imageEditor()
                            ->moveFiles()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('experiences/slider_images')
                            ->columnSpanFull(),
                    ]),

                TextInput::make('luma_event_id')
                    ->label('Associer un évenement Luma')
                    ->hint("Placez ici l'identifiant Luma de l'évenement (si existant)")
                    ->columnSpanFull()
            ]);
    }
}

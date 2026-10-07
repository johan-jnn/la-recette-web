<?php

namespace App\Filament\Resources\Articles\Tables;

use App\Filament\Resources\Experiences\Pages\EditExperience;
use App\Models\Article;
use App\Models\Experience;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('experience.title')
                    ->label("Expérience associée")
                    ->url(
                        fn(?Article $record) => $record->experience()->exists() ? EditExperience::getUrl([
                            'record' => $record->experience
                        ]) : null
                    )
                    ->default("-")
            ])
            ->filters([
                //
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

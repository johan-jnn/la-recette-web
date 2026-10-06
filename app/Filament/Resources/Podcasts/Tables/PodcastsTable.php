<?php

namespace App\Filament\Resources\Podcasts\Tables;

use App\Models\Podcast;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PodcastsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label("Titre")
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->searchable(),
                TextColumn::make('publish_date')
                    ->label('Date de publication')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('urls')
                    ->state(fn(Podcast $record) => $record->urls()->count())
                    ->label('Nombre de plateformes')
                    ->sortable(),
                TextColumn::make('duration')
                    ->label("Durée de l'épisode")
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label("Date d'ajout")
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Dernière modification')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

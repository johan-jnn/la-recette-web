<?php

namespace App\Filament\Resources\ContactEntries\Tables;

use App\Enums\ContactType;
use App\Models\ContactEntry;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Str;

class ContactEntriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->getStateUsing(
                        fn(ContactEntry $record) => Str::ucfirst($record->first_name) . " " . Str::upper($record->last_name)
                    )
                    ->label("Contact")
                    ->searchable(),
                TextColumn::make('object')
                    ->label("Objet")
                    ->searchable(),
                TextColumn::make('type')
                    ->badge()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Adresse email')
                    ->url(fn(string $state) => "mailto:$state")
                    ->searchable(),
                TextColumn::make('phone')
                    ->label("Téléphone")
                    ->url(fn(string $state) => "tel:$state")
                    ->searchable(),
                TextColumn::make('company_name')
                    ->label("Entreprise")
                    ->searchable()
                    ->default('-'),
                TextColumn::make('created_at')
                    ->label("Date d'envoi")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('email')
                    ->multiple()
                    ->label("Email(s)")
                    ->options(ContactEntry::groupBy('email')->pluck('email', 'email'))
                    ->searchable(),
                SelectFilter::make('company_name')
                    ->multiple()
                    ->label('Entreprise(s)')
                    ->options(ContactEntry::groupBy('company_name')->pluck('company_name', 'company_name'))
                    ->searchable(),
                SelectFilter::make('type')
                    ->multiple()
                    ->label('Type(s) de demande')
                    ->options(ContactType::class)
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

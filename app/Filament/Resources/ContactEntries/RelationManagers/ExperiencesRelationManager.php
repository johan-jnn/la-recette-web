<?php

namespace App\Filament\Resources\ContactEntries\RelationManagers;

use App\Filament\Resources\Experiences\ExperienceResource;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ExperiencesRelationManager extends RelationManager
{
    protected static string $relationship = 'experiences';

    protected static ?string $relatedResource = ExperienceResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
                AttachAction::make(),
            ])
            ->inverseRelationship('contacts');
    }

    public function isReadOnly(): bool
    {
        return false;
    }
}

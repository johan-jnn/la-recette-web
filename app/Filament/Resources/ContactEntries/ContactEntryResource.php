<?php

namespace App\Filament\Resources\ContactEntries;

use App\Filament\Resources\ContactEntries\Pages\CreateContactEntry;
use App\Filament\Resources\ContactEntries\Pages\EditContactEntry;
use App\Filament\Resources\ContactEntries\Pages\ListContactEntries;
use App\Filament\Resources\ContactEntries\Pages\ViewContactEntry;
use App\Filament\Resources\ContactEntries\RelationManagers\ExperiencesRelationManager;
use App\Filament\Resources\ContactEntries\Schemas\ContactEntryForm;
use App\Filament\Resources\ContactEntries\Schemas\ContactEntryInfolist;
use App\Filament\Resources\ContactEntries\Tables\ContactEntriesTable;
use App\Models\ContactEntry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ContactEntryResource extends Resource
{
    protected static ?string $model = ContactEntry::class;

    protected static string|BackedEnum|null $navigationIcon = 'iconpark-emaildown-o';

    protected static ?string $recordTitleAttribute = 'object';
    protected static ?string $label = 'Prise de contact';
    protected static ?string $pluralLabel = 'Prises de contact';

    public static function form(Schema $schema): Schema
    {
        return ContactEntryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ContactEntryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactEntriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ExperiencesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContactEntries::route('/'),
            'create' => CreateContactEntry::route('/create'),
            'view' => ViewContactEntry::route('/{record}'),
            'edit' => EditContactEntry::route('/{record}/edit'),
        ];
    }
}

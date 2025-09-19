<?php

namespace App\Filament\Resources\Practicantes;

use App\Filament\Resources\Practicantes\Pages\CreatePracticante;
use App\Filament\Resources\Practicantes\Pages\EditPracticante;
use App\Filament\Resources\Practicantes\Pages\ListPracticantes;
use App\Filament\Resources\Practicantes\Pages\ViewPracticante;
use App\Filament\Resources\Practicantes\Schemas\PracticanteForm;
use App\Filament\Resources\Practicantes\Schemas\PracticanteInfolist;
use App\Filament\Resources\Practicantes\Tables\PracticantesTable;
use App\Models\Practicante;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PracticanteResource extends Resource
{
    protected static ?string $model = Practicante::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return PracticanteForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PracticanteInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PracticantesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPracticantes::route('/'),
            'create' => CreatePracticante::route('/create'),
            'view' => ViewPracticante::route('/{record}'),
            'edit' => EditPracticante::route('/{record}/edit'),
        ];
    }
}

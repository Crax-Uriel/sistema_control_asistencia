<?php

namespace App\Filament\Resources\Practicantes\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PracticanteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('fotografia_ciudadano')
                ->label('Fotografía')
                ->content(fn ($record) => $record->fotografia_practicante 
                    ? '<img src="' . asset("storage/{$record->fotografia_practicante}") . '" width="100" height="100">' 
                    : 'Sin foto')
                ->html()
                ->columnSpanFull(),
                TextEntry::make('nombre_practicante'),
                TextEntry::make('apellido_paterno_practicante'),
                TextEntry::make('apellido_materno_practicante'),
                TextEntry::make('curp_materno_practicante'),
                TextEntry::make('telefono_practicante'),
                TextEntry::make('direccion_practicante')->html(),
                TextEntry::make('genero_practicante'),
                TextEntry::make('fecha_nacimiento_practicante')
                    ->date(),
                TextEntry::make('email_practicante'),
                TextEntry::make('estado_practicante'),
                TextEntry::make('area.nombre_area')
                    ->label('Area a relizar practicas'),
                TextEntry::make('fecha_ingreso_practicante'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}

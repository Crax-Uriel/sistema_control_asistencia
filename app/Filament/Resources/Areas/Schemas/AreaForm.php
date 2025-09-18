<?php

namespace App\Filament\Resources\Areas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AreaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre_area')
                    ->required(),
                Textarea::make('descripcion_area')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->required()
                    ->options([
                        'Activo' => 'Activo',
                        'Inactivo' => 'Inactivo',
                    ]),
                /*TextInput::make('status')
                    ->required(),*/
            ]);
    }
}

<?php

namespace App\Filament\Resources\Practicantes\Schemas;

use App\Models\Area;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PracticanteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre_practicante')
                    ->required()
                    ->maxLength(40)
                    ->minLength(2)
                    ->rule('regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/')
                    ->validationMessages([
                        'required' => 'El campo Nombre es obligatorio.',
                        'min' => 'El campo Nombre no cumple con el numero minimo de caracteres.',
                        'max' => 'El campo Nombre sobrepaso el numero maximo de caracteres.',
                        'regex' => 'El campo Nombre tiene un formato inválido.',
                    ]),
                    
                TextInput::make('apellido_paterno_practicante')
                    ->required()
                    ->maxLength(70)
                    ->minLength(2)
                    ->rule('regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/')
                    ->validationMessages([
                        'required' => 'El campo Apellido Paterno es obligatorio.',
                        'min' => 'El campo Apellido Paterno no cumple con el numero minimo de caracteres.',
                        'max' => 'El campo Apellido Paterno sobrepaso el numero maximo de caracteres.',
                        'regex' => 'El campo Apellido Paterno tiene un formato inválido.',
                    ]),
                    
                TextInput::make('apellido_materno_practicante')
                    ->required()
                    ->maxLength(70)
                    ->minLength(2)
                    ->rule('regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/')
                    ->validationMessages([
                        'required' => 'El campo Apellido Materno es obligatorio.',
                        'min' => 'El campo Apellido Materno no cumple con el numero minimo de caracteres.',
                        'max' => 'El campo Apellido Materno sobrepaso el numero maximo de caracteres.',
                        'regex' => 'El campo Apellido Materno tiene un formato inválido.',
                    ]),
                    
                TextInput::make('curp_practicante')
                    ->required()
                    ->maxLength(18)
                    ->minLength(18)
                    ->rule('regex:/^[A-Z0-9]+$/')
                    ->validationMessages([
                        'required' => 'El campo CURP es obligatorio.',
                        'min' => 'El campo CURP debe tener exactamente 18 caracteres.',
                        'max' => 'El campo CURP sobrepaso el numero maximo de caracteres.',
                        'regex' => 'El campo CURP debe escribirse solo en mayúsculas y números.',
                    ])
                    ->afterStateUpdated(fn ($state, callable $set) => $set('name', strtoupper($state)))
                    ->reactive(),
                RichEditor::make('direccion_practicante')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('telefono_practicante')
                    ->tel()
                    ->required()
                    ->maxLength(10)
                    ->minLength(10)
                    ->rule('regex:/^[0-9]+$/')
                    ->validationMessages([
                        'required' => 'El campo Telefono es obligatorio.',
                        'min' => 'El campo Telefono no cumple con el numero minimo de caracteres.',
                        'max' => 'El campo Telefono sobrepaso el numero maximo de caracteres.',
                        'regex' => 'El campo Telefono tiene un formato inválido.',
                    ]),
                Select::make('genero_practicante')
                    ->required()
                    ->options([
                        'Masculino' => 'Masculino',
                        'Femenino' => 'Femenino',
                    ]),
                DatePicker::make('fecha_nacimiento_practicante')->required(),

                TextInput::make('name')
                    ->label('Nombre de usuario')
                    ->required()
                    ->disabled()
                    ->dehydrated(false),
                    

                TextInput::make('email')
                    ->label('Correo electrónico')
                    ->email()
                    ->required()
                    ->dehydrated(false),
                    

                TextInput::make('password')
                    ->password()
                    ->required()
                    ->disabled()
                    ->default('12345678')
                    ->dehydrated(false), // contraseña por defecto

                TextInput::make('codigo_gafete')
                    ->numeric()
                    ->required()
                    ->maxLength(5)
                    ->minLength(5)
                    ->prefix('TJA-')
                    ->rule('regex:/^[0-9]+$/')
                    ->validationMessages([
                        'required' => 'El campo Codigo_Gafete es obligatorio.',
                        'min' => 'El campo Codigo_Gafete no cumple con el numero minimo de caracteres.',
                        'max' => 'El campo Codigo_Gafete sobrepaso el numero maximo de caracteres.',
                        'regex' => 'El campo Codigo_Gafete tiene un formato inválido.',
                    ]),
                
                Select::make('area_id')
                    ->required()
                    ->label('Area a relizar practicas')
                    ->options(Area::all()->pluck('nombre_area','id')),
                Select::make('status_practicante')
                    ->required()
                    ->options([
                        'Activo' => 'Activo',
                        'Inactivo' => 'Inactivo',
                    ]),
                DatePicker::make('fecha_ingreso_practicante')->required(),
                FileUpload::make('fotografia_practicante')
                    ->required()
                    ->columnSpanFull()
                    ->image()
                    ->disk('public')
                    ->directory('practicantes'),
            ]);
    }
}

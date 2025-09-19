<?php

namespace App\Filament\Resources\Practicantes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PracticantesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->label('#')
                    ->rowIndex()
                    ->alignCenter(),
                ImageColumn::make('fotografia_practicante')
                    ->disk('public')       // Indica que está en storage/app/public
                    ->searchable()
                    ->width(100)
                    ->height(100),
                TextColumn::make('nombre_completo')
                    ->label('Nombre Completo')
                    ->alignCenter() 
                    ->getStateUsing(function ($record) {
                        return $record->apellido_paterno_practicante . ' ' . 
                            $record->apellido_materno_practicante . ' ' . 
                            $record->nombre_practicante;
                    })
                    ->searchable(function ($query, $search) {
                        // Búsqueda en los tres campos
                        $query->where('nombre_ciudadano', 'like', "%{$search}%")
                            ->orWhere('apellido_paterno_ciudadano', 'like', "%{$search}%")
                            ->orWhere('apellido_materno_ciudadano', 'like', "%{$search}%");
                    }),
                TextColumn::make('curp_practicante')
                    ->searchable()
                    ->alignCenter(),
                
                /*TextColumn::make('direccion_ciudadano')
                    ->searchable()
                    ->html(),
                TextColumn::make('genero_ciudadano')
                    ->searchable(),
                TextColumn::make('fecha_nacimiento_ciudadano')
                    ->date()
                    ->sortable(),
                
                    */
                TextColumn::make('telefono_practicante')
                    ->searchable()
                    ->alignCenter(),
                
                TextColumn::make('user.email')
                    ->searchable()
                    ->alignCenter()
                    ->label('Correo electronico'),
                
                TextColumn::make('status_practicante')
                    ->label('Status')
                    ->searchable()
                    ->colors([
                        'success' => fn ($record) => $record->status_practicante === 'Activo',
                        'danger' => fn ($record) => $record->status_practicante === 'Inactivo',
                    ]),

                TextColumn::make('area.nombre_area')
                    ->searchable()
                    ->alignCenter(),
                TextColumn::make('fecha_ingreso_practicante')
                    ->date()
                    ->sortable()
                    ->alignCenter(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

                SelectFilter::make('status_practicante')
                    ->options([
                        'Activo' => 'Activo' ,
                        'Inactivo' => 'Inactivo' ,
                    ])
                    ->placeholder('Filtrar por status')
                    ->label('Status')
                
            ])
            ->recordActions([
                ViewAction::make()
                    ->button()
                    ->color('info'),
                EditAction::make()
                    ->button()
                    ->color('warning'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

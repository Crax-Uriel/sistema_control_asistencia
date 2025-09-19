<?php

namespace App\Filament\Resources\Areas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AreasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->label('#')
                    ->rowIndex(),
                TextColumn::make('nombre_area')
                    ->label('Nombre del Área')
                    ->searchable()
                    ->alignCenter(),
                TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->colors([
                        'success' => fn ($record) => $record->status === 'Activo',
                        'danger' => fn ($record) => $record->status === 'Inactivo',
                    ]),
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
                SelectFilter::make('status')
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

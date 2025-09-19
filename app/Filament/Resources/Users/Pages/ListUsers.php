<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Crear Usuario')          
                ->icon('heroicon-o-plus')      
                ->color('success')             
                ->extraAttributes([
                        'style' => 'background: linear-gradient(to right, #044085ff, #13a172ff); color: white;',
                        'class' => 'btn-icon-white', 
                ]),
           
        ];
    }
}

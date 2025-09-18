<?php

namespace App\Filament\Resources\Areas\Pages;

use App\Filament\Resources\Areas\AreaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAreas extends ListRecords
{
    protected static string $resource = AreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Crear Área')          
                ->icon('heroicon-o-plus')      
                ->color('success')             
                ->extraAttributes([
                        'style' => 'background: linear-gradient(to right, #044085ff, #13a172ff); color: white;',
                        'class' => 'btn-icon-white', 
                ]),
           
        ];
    }
}

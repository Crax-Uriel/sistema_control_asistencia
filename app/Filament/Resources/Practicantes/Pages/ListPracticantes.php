<?php

namespace App\Filament\Resources\Practicantes\Pages;

use App\Filament\Resources\Practicantes\PracticanteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPracticantes extends ListRecords
{
    protected static string $resource = PracticanteResource::class;

    


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Crear Practicante')          
                ->icon('heroicon-o-plus')      
                ->color('success')             
                ->extraAttributes([
                        'style' => 'background: linear-gradient(to right, #044085ff, #13a172ff); color: white;',
                        'class' => 'btn-icon-white', 
                ]),
           
        ];
    }
}

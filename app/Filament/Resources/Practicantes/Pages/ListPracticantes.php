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
            CreateAction::make(),
        ];
    }
}

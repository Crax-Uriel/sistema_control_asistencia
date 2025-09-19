<?php

namespace App\Filament\Resources\Practicantes\Pages;

use App\Filament\Resources\Practicantes\PracticanteResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPracticante extends ViewRecord
{
    protected static string $resource = PracticanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

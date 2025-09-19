<?php

namespace App\Filament\Resources\Practicantes\Pages;

use App\Filament\Resources\Practicantes\PracticanteResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPracticante extends EditRecord
{
    protected static string $resource = PracticanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

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
            ViewAction::make()
                ->color('info'),
            DeleteAction::make(),
        ];
    }


    protected function getFormActions(): array
    {
        return[
            $this->getSaveFormAction()
                ->label('Guardar cambios')
                ->color('warning'),
            
            $this->getCancelFormAction()
                ->label('Cancelar')
                ->color('danger'),

        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

<?php

namespace App\Filament\Resources\Areas\Pages;

use App\Filament\Resources\Areas\AreaResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateArea extends CreateRecord
{
    protected static string $resource = AreaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
        ->title('Área creada')
        ->body('El área se ha creado exitosamente')
        ->success();
    }

   
    protected function getFormActions(): array
    {
        return[
            $this->getCreateFormAction()
                ->label('Guardar')
                ->extraAttributes(['style' => 'background: linear-gradient(to right, #044085ff, #13a172ff); color: white;']),
            $this->getCreateAnotherFormAction()
                ->label('Guardar y nuevo'),

            $this->getCancelFormAction()
                ->label('Cancelar')
                ->color('danger'),

        ];
    }
}

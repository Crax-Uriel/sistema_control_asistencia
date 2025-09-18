<?php

namespace App\Filament\Resources\Areas\Pages;

use App\Filament\Resources\Areas\AreaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditArea extends EditRecord
{
    protected static string $resource = AreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make()
                    ->button()
                    ->color('info'),
            DeleteAction::make(),
        ];
    }


    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
        ->title('Área actualizada')
        ->body('El área se ha actualizada exitosamente')
        ->success();
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
}

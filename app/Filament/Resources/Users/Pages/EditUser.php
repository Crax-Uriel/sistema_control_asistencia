<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

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
                ->color('secondary'),

        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

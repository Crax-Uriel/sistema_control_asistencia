<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

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

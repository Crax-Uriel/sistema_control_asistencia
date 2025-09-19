<?php

namespace App\Filament\Resources\Practicantes\Pages;

use App\Filament\Resources\Practicantes\PracticanteResource;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreatePracticante extends CreateRecord
{
    protected static string $resource = PracticanteResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
        ->title('Practicante creado')
        ->body('El practicante se ha creado exitosamente')
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

    protected function afterCreate(): void
    {
        $practicante = $this->record; // el practicante recién creado

        // Crear el usuario usando los datos del formulario
        $user = User::create([
            'name'     => $practicante->nombre_practicante . ' ' . $practicante->apellido_paterno_practicante,
            'email'    => $this->data['email'], // email que capturaste en el form
            'password' => Hash::make($this->data['password'] ?? '12345678'), // password desde form o default
        ]);

        // Asignar rol "practicante" con Shield/Spatie
        $user->assignRole('practicante');


        $practicante->update(['user_id' => $user->id]);
    }

}

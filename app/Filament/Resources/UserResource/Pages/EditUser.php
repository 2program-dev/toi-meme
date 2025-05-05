<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->action(function ($record, DeleteAction $action) {
                    try {
                        $record->delete();
                        Notification::make()
                            ->success()
                            ->title('Utente eliminato')
                            ->body('L\'utente è stato eliminato con successo.')
                            ->send();
                    } catch (\Exception $e) {
                        Notification::make()
                            ->danger()
                            ->title('Errore durante l\'eliminazione')
                            ->body('Impossibile eliminare l\'utente')
                            ->send();

                        $action->cancel();
                    }
                }),
        ];
    }
}

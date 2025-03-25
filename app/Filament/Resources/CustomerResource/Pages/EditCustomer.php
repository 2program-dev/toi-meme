<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\ForceDeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            ForceDeleteAction::make()
                ->action(function ($record, ForceDeleteAction $action) {
                    try {
                        $record->forceDelete();
                        Notification::make()
                            ->success()
                            ->title('Cliente eliminato')
                            ->body('Il cliente è stato eliminato con successo.')
                            ->send();
                    } catch (\Exception $e) {
                        Notification::make()
                            ->danger()
                            ->title('Errore durante l\'eliminazione')
                            ->body('Impossibile eliminare il cliente. Ci sono ordini associati.')
                            ->send();

                        $action->cancel();
                    }
                }),
            Actions\RestoreAction::make(),
        ];
    }
}

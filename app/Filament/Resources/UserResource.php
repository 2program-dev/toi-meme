<?php

namespace App\Filament\Resources;

use App\Enum\OrderStatus;
use App\Enum\UserRole;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $modelLabel = 'Utente';
    protected static ?string $pluralModelLabel = 'Utenti';
    protected static ?string $navigationLabel = 'Utenti';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        $operation = $form->getOperation();

        return $form
            ->schema([
                Split::make([
                    Section::make([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->validationMessages(
                                [
                                    'unique' => 'L\'email inserita è già in uso.',
                                ]
                            ),
                        Select::make('role')
                            ->label('Ruolo')
                            ->placeholder('Seleziona un ruolo')
                            ->options(UserRole::options())
                            ->required(),
                        Select::make('approved')
                            ->label('Stato')
                            ->placeholder('Seleziona uno stato')
                            ->options([
                                true => 'Approvato',
                                false => 'Non approvato'
                            ])
                            ->required()
                            ->default(true)
                            ->reactive()
                            ->dehydrated(fn (?bool $state): bool => filled($state)),
                    ]),
                    Section::make([
                        TextInput::make('password')
                            ->label('Password')
                            ->helperText("minimo 6 caratteri")
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->nullable(fn (string $operation): bool => $operation === 'edit')
                            ->password()
                            ->maxLength(255)
                            ->minLength(6)
                            ->revealable()
                            ->dehydrated(fn (?string $state): bool => filled($state)),
                        TextInput::make('password_confirmation')
                            ->label('Conferma Password')
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->nullable(fn (string $operation): bool => $operation === 'edit')
                            ->password()
                            ->maxLength(255)
                            ->minLength(6)
                            ->revealable()
                            ->same('password')
                            ->validationMessages([
                                'same' => 'Le password non corrispondono.',
                            ]),
                    ])
                    ->description($operation === 'create' ? "Crea una password" : "Da compilare solo nel caso in cui si voglia modificare la password dell'utente."),
                ])->columns(1)
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('role')
                    ->label('Ruolo')
                    ->formatStateUsing(fn (string $state): string => UserRole::tryFrom($state)?->label() ?? $state)
                    ->sortable()
                    ->searchable(),
                TextColumn::make('approved')
                    ->label('Stato')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Approvato' : 'Non approvato')
                    ->color(fn (bool $state): string => $state ? 'success' : 'danger')
                    // action to toggle state
                    ->action(function (User $record) {
                        $record->update(['approved' => !$record->approved]);
                        Notification::make()
                            ->success()
                            ->title('Stato aggiornato')
                            ->body('Lo stato dell\'utente è stato aggiornato con successo.')
                            ->send();
                    })
                    ->sortable()
                    ->grow(false),
                TextColumn::make('created_at')
                    ->label('Data di creazione')
                    ->dateTime("d F Y, H:i:s")
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Ultima modifica')
                    ->dateTime("d F Y, H:i:s")
                    ->sortable()
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Ruolo')
                    ->placeholder('Tutti i ruoli')
                    ->options(UserRole::options())
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->action(function ($record, Tables\Actions\DeleteAction $action) {
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
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->action(function ($records, Tables\Actions\DeleteBulkAction $action) {
                            $deleted = 0;
                            $notDeleted = 0;

                            foreach ($records as $record) {
                                try {
                                    $record->delete();
                                    $deleted++;
                                } catch (\Exception $e) {
                                    $notDeleted++;
                                }
                            }

                            if ($deleted > 0) {
                                Notification::make()
                                    ->success()
                                    ->title('Utenti eliminati')
                                    ->body("Sono stati eliminati {$deleted} utenti.")
                                    ->send();
                            }

                            if ($notDeleted > 0) {
                                Notification::make()
                                    ->danger()
                                    ->title('Errore durante l\'eliminazione')
                                    ->body("Impossibile eliminare {$notDeleted} utenti.")
                                    ->send();
                            }

                            $action->refresh();
                        }),
                ]),
            ])
            ->defaultPaginationPageOption(10);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $modelLabel = 'Cliente';
    protected static ?string $pluralModelLabel = 'Clienti';
    protected static ?string $navigationLabel = 'Clienti';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Split::make([
                    Section::make('')
                        ->schema([
                            Forms\Components\Select::make('user_id')
                                ->label('Utente')
                                ->relationship('user', 'email')
                                ->searchable([
                                    'email',
                                    'name'
                                ])
                                ->nullable()
                                ->unique(ignoreRecord: true)
                                ->validationMessages(
                                    [
                                        'unique' => 'L\'utente è già collegato ad un altro cliente',
                                    ]
                                ),
                            TextInput::make('first_name')
                                ->label('Nome')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('last_name')
                                ->label('Cognome')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('phone')
                                ->label('Telefono')
                                ->nullable()
                                ->maxLength(255),
                        ]),
                    Section::make('')
                        ->schema([
                            TextInput::make('company')
                                ->label('Azienda')
                                ->nullable()
                                ->maxLength(255),
                            TextInput::make('vat')
                                ->label('Partita IVA')
                                ->nullable()
                                ->maxLength(13),
                            TextInput::make('fiscal_code')
                                ->label('Codice Fiscale')
                                ->nullable()
                                ->maxLength(16),
                            TextInput::make('sdi')
                                ->label('Codice SDI')
                                ->nullable()
                                ->maxLength(7),
                        ]),
                ])->columnSpan(2),
                Forms\Components\Split::make([
                        Section::make('Indirizzo di fatturazione')
                            ->schema([
                                TextInput::make('billing_address')
                                    ->label('Indirizzo')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('billing_city')
                                    ->label('Città')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('billing_state')
                                    ->label('Provincia')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('billing_zip')
                                    ->label('CAP')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('billing_country')
                                    ->label('Nazione')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    Section::make('Indirizzo di spedizione')
                            ->schema([
                                TextInput::make('shipping_address')
                                    ->label('Indirizzo')
                                    ->nullable()
                                    ->maxLength(255),
                                TextInput::make('shipping_city')
                                    ->label('Città')
                                    ->nullable()
                                    ->maxLength(255),
                                TextInput::make('shipping_state')
                                    ->label('Provincia')
                                    ->nullable()
                                    ->maxLength(255),
                                TextInput::make('shipping_zip')
                                    ->label('CAP')
                                    ->nullable()
                                    ->maxLength(255),
                                TextInput::make('shipping_country')
                                    ->label('Nazione')
                                    ->nullable()
                                    ->maxLength(255),
                            ]),
                    ])->columnSpan(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->label('Nome')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->label('Cognome')
                    ->searchable(),
                TextColumn::make('user.email')
                    ->label('Utente')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Telefono')
                    ->searchable(),
                TextColumn::make('company')
                    ->label('Azienda')
                    ->searchable(),
                TextColumn::make('vat')
                    ->label('Partita IVA')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('fiscal_code')
                    ->label('Codice Fiscale')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('sdi')
                    ->label('Codice SDI')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('billing_address')
                    ->label('Indirizzo di fatturazione')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('billing_city')
                    ->label('Città di fatturazione')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('billing_state')
                    ->label('Provincia di fatturazione')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('billing_zip')
                    ->label('CAP di fatturazione')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('billing_country')
                    ->label('Nazione di fatturazione')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('shipping_address')
                    ->label('Indirizzo di spedizione')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('shipping_city')
                    ->label('Città di spedizione')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('shipping_state')
                    ->label('Provincia di spedizione')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('shipping_zip')
                    ->label('CAP di spedizione')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('shipping_country')
                    ->label('Nazione di spedizione')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('deleted_at')
                    ->label('Data eliminazione')
                    ->dateTime("d F Y, H:i:s")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Data creazione')
                    ->dateTime("d F Y, H:i:s")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Ultima modifica')
                    ->dateTime("d F Y, H:i:s")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
                ->label('Cestinati'),
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->action(function ($records, Tables\Actions\ForceDeleteBulkAction $action) {
                            $deleted = 0;
                            $notDeleted = 0;

                            foreach ($records as $record) {
                                try {
                                    $record->forceDelete();
                                    $deleted++;
                                } catch (\Exception $e) {
                                    $notDeleted++;
                                }
                            }

                            if ($deleted > 0) {
                                Notification::make()
                                    ->success()
                                    ->title('Clienti eliminati')
                                    ->body("Sono stati eliminati {$deleted} clienti.")
                                    ->send();
                            }

                            if ($notDeleted > 0) {
                                Notification::make()
                                    ->danger()
                                    ->title('Errore durante l\'eliminazione')
                                    ->body("Impossibile eliminare {$notDeleted} clienti.")
                                    ->send();
                            }

                            $action->refresh();
                        }),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

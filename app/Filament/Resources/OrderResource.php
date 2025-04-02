<?php

namespace App\Filament\Resources;

use App\Enum\OrderStatus;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $modelLabel = 'Ordine';
    protected static ?string $pluralModelLabel = 'Ordini';
    protected static ?string $navigationLabel = 'Ordini';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Split::make([
                    Section::make('Informazioni ordine')
                        ->schema([
                            TextInput::make('order_number')
                                ->label('Numero ordine')
                                ->prefix('#')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Select::make('customer_id')
                                ->label('Cliente')
                                ->relationship('customer')
                                ->getOptionLabelFromRecordUsing(function ($record) {
                                    return $record->first_name . ' ' . $record->last_name;
                                })
                                ->searchable(['first_name', 'last_name'])
                                ->nullable(),
                            Forms\Components\DateTimePicker::make('created_at')
                                ->label('Data creazione')
                                ->required()
                                ->default(now())
                                ->format('d F Y, H:i:s'),
                            Forms\Components\Select::make('status')
                                ->label('Stato dell\'ordine')
                                ->options(OrderStatus::options())
                                ->default(OrderStatus::ORDER_RECEIVED)
                                ->required(),
                        ])
                ])
                ->columnSpan(2),
                Section::make('Carrello')
                    ->schema([
                        TextInput::make('subtotal')
                            ->label('Subtotale')
                            ->required()
                            ->numeric()
                            ->prefix('€')
                            ->default(0.00),
                        TextInput::make('total')
                            ->label('Totale')
                            ->required()
                            ->numeric()
                            ->prefix('€')
                            ->default(0.00),
                        Forms\Components\Repeater::make('orderRows')
                            ->relationship()
                            ->label('')
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->label('Prodotto')
                                    ->relationship('product')
                                    ->getOptionLabelFromRecordUsing(function ($record) {
                                        return $record->title;
                                    })
                                    ->searchable(['first_name', 'last_name'])
                                    ->nullable(),
                                Forms\Components\TextInput::make('product_title')
                                    ->label('Nome prodotto')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('quantity')
                                    ->label('Quantità')
                                    ->required()
                                    ->numeric()
                                    ->default(1),
                                Forms\Components\TextInput::make('price')
                                    ->label('Prezzo unitario')
                                    ->required()
                                    ->numeric()
                                    ->prefix('€')
                                    ->default(0.00),
                                Forms\Components\TextInput::make('total')
                                    ->label('Totale')
                                    ->required()
                                    ->numeric()
                                    ->prefix('€')
                                    ->default(0.00),
                                //  customizazion - boolean field
                                Forms\Components\Toggle::make('customization')
                                    ->label('Personalizzazione')
                                    ->nullable(),
                            ])
                            ->addActionLabel("Aggiungi prodotto all'ordine")
                            ->columns(5)
                            ->columnSpanFull()
                    ])->columns(2),
                Forms\Components\Split::make([
                    Section::make('Dati cliente')
                        ->schema([
                            TextInput::make('customer_first_name')
                                ->label('Nome')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('customer_last_name')
                                ->label('Cognome')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('customer_phone')
                                ->label('Telefono')
                                ->nullable()
                                ->maxLength(255),
                            TextInput::make('customer_company')
                                ->label('Azienda')
                                ->nullable()
                                ->maxLength(255),
                            TextInput::make('customer_vat')
                                ->label('Partita IVA')
                                ->nullable()
                                ->minLength(11)
                                ->maxLength(13),
                            TextInput::make('customer_fiscal_code')
                                ->label('Codice Fiscale')
                                ->nullable()
                                ->minLength(11)
                                ->maxLength(16),
                            TextInput::make('customer_sdi')
                                ->label('Codice SDI')
                                ->nullable()
                                ->maxLength(255),
                        ]),
                    Section::make('Indirizzo di fatturazione')
                        ->schema([
                            TextInput::make('customer_billing_address')
                                ->label('Indirizzo')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('customer_billing_city')
                                ->label('Città')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('customer_billing_state')
                                ->label('Provincia')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('customer_billing_zip')
                                ->label('CAP')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('customer_billing_country')
                                ->label('Nazione')
                                ->required()
                                ->maxLength(255),
                        ]),
                    Section::make('Indirizzo di spedizione')
                        ->headerActions([
                            Forms\Components\Actions\Action::make('copy_billing_address')
                                ->label('Copia indirizzo di fatturazione')
                                ->color('gray')
                                ->size('sm')
                                ->icon('heroicon-o-clipboard-document-list')
                                ->action(function (Forms\Set $set, Forms\Get $get) {
                                    $set('customer_shipping_address', $get('customer_billing_address'));
                                    $set('customer_shipping_city', $get('customer_billing_city'));
                                    $set('customer_shipping_state', $get('customer_billing_state'));
                                    $set('customer_shipping_zip', $get('customer_billing_zip'));
                                    $set('customer_shipping_country', $get('customer_billing_country'));
                                })
                                ->hidden(fn (string $operation): bool => $operation === 'view'),
                        ])
                        ->schema([
                            TextInput::make('customer_shipping_address')
                                ->label('Indirizzo')
                                ->nullable()
                                ->maxLength(255),
                            TextInput::make('customer_shipping_city')
                                ->label('Città')
                                ->nullable()
                                ->maxLength(255),
                            TextInput::make('customer_shipping_state')
                                ->label('Provincia')
                                ->nullable()
                                ->maxLength(255),
                            TextInput::make('customer_shipping_zip')
                                ->label('CAP')
                                ->nullable()
                                ->maxLength(255),
                            TextInput::make('customer_shipping_country')
                                ->label('Nazione')
                                ->nullable()
                                ->maxLength(255),
                        ]),
                ])->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                    ->label('Numero ordine')
                    ->prefix('#')
                    ->suffix(function($record){
                        return ' / ' . $record->created_at->format('Y');
                    })
                    ->searchable()
                    ->grow(false),
                TextColumn::make('status')
                    ->label('Stato dell\'ordine')
                    ->formatStateUsing(fn (string $state): string => OrderStatus::tryFrom($state)?->label() ?? $state)
                    ->badge()
                    ->color(fn (string $state): string => OrderStatus::badgeColors($state))
                    ->sortable()
                    ->grow(false),
                TextColumn::make('created_at')
                    ->label('Data creazione')
                    ->dateTime("d F Y, H:i:s")
                    ->sortable(),
                TextColumn::make('customer_billing_full_address')
                    ->label('Indirizzo di fatturazione')
                    ->html()
                    ->getStateUsing(function ($record) {
                        return  $record->customer_first_name . ' ' . $record->customer_last_name . '<br>' .$record->customer_billing_address . ', ' . $record->customer_billing_zip . ' ' . $record->customer_billing_city . ', ' . $record->customer_billing_state . ', ' . $record->customer_billing_country;
                    })
                    ->description(fn ($record): string => ($record->customer_company) ?? '')
                    ->searchable(['customer_first_name', 'customer_last_name', 'customer_billing_address', 'customer_billing_zip', 'customer_billing_city', 'customer_billing_state', 'customer_billing_country'])
                    ->grow(true)
                    ->wrap(true),
                TextColumn::make('customer_shipping_full_address')
                    ->label('Indirizzo di spedizione')
                    ->getStateUsing(function ($record) {
                        return $record->customer_shipping_address . ', ' . $record->customer_shipping_zip . ' ' . $record->customer_shipping_city . ', ' . $record->customer_shipping_state . ', ' . $record->customer_shipping_country;
                    })
                    ->description(fn ($record): string => ($record->customer_company) ?? '')
                    ->searchable(['customer_shipping_address', 'customer_shipping_zip', 'customer_shipping_city', 'customer_shipping_state', 'customer_shipping_country'])
                    ->grow(false)
                    ->wrap(true)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('subtotal')
                    ->label('Subtotale')
                    ->numeric(decimalPlaces: 2)
                    ->money('EUR')
                    ->sortable()
                    ->grow(false),
                TextColumn::make('total')
                    ->label('Totale')
                    ->numeric(decimalPlaces: 2)
                    ->money('EUR')
                    ->sortable()
                    ->grow(false),
                TextColumn::make('updated_at')
                    ->label('Ultima modifica')
                    ->dateTime("d F Y, H:i:s")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Stato dell\'ordine')
                    ->placeholder('Tutti gli stati')
                    ->options(OrderStatus::options()),

                Tables\Filters\Filter::make('created_at_range')
                    ->label('Intervallo di date')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dal giorno'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Al giorno'),
                    ])->columns(2)
                    ->query(function (\Illuminate\Database\Eloquent\Builder $query, array $data) {
                        return $query
                            ->when($data['created_from'], fn ($query, $date) => $query->whereDate('created_at', '>=', $date))
                            ->when($data['created_until'], fn ($query, $date) => $query->whereDate('created_at', '<=', $date));
                    }),
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->actions([
                Tables\Actions\ViewAction::make('view')
                    ->label('Visualizza'),
                Tables\Actions\Action::make('change_order_status')
                    ->label('Cambia stato')
                    ->icon('heroicon-o-arrows-right-left')
                    ->form([
                        Forms\Components\Select::make('status')
                            ->label('Nuovo stato')
                            ->options(OrderStatus::options())
                            ->required(),
                    ])
                    ->modalSubmitActionLabel('Salva stato')
                    ->action(function ($record, array $data) {
                        $record->status = $data['status'];
                        $record->save();
                    }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}

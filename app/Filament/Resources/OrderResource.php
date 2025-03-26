<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\TextInput::make('customer_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('order_number')
                    ->required()
                    ->maxLength(255),
                // TODO ORDER STATUS
                Forms\Components\TextInput::make('subtotal')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('customer_first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_last_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_company')
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_vat')
                    ->maxLength(13),
                Forms\Components\TextInput::make('customer_fiscal_code')
                    ->maxLength(16),
                Forms\Components\TextInput::make('customer_sdi')
                    ->maxLength(7),
                Forms\Components\TextInput::make('customer_billing_address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_billing_city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_billing_state')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_billing_zip')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_billing_country')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_shipping_address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_shipping_city')
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_shipping_state')
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_shipping_zip')
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_shipping_country')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_number')
                    ->searchable(),
                // TODO ORDER STATUS
                Tables\Columns\TextColumn::make('subtotal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer_first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_company')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_vat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_fiscal_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_sdi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_billing_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_billing_city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_billing_state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_billing_zip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_billing_country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_shipping_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_shipping_city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_shipping_state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_shipping_zip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_shipping_country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}

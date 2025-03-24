<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('company')
                    ->maxLength(255),
                Forms\Components\TextInput::make('vat')
                    ->maxLength(13),
                Forms\Components\TextInput::make('fiscal_code')
                    ->maxLength(16),
                Forms\Components\TextInput::make('sdi')
                    ->maxLength(7),
                Forms\Components\TextInput::make('billing_address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('billing_city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('billing_state')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('billing_zip')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('billing_country')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_city')
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_state')
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_zip')
                    ->maxLength(255),
                Forms\Components\TextInput::make('shipping_country')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fiscal_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sdi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('billing_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('billing_city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('billing_state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('billing_zip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('billing_country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_zip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
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

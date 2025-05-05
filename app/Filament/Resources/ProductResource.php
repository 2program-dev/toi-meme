<?php

namespace App\Filament\Resources;

use App\Filament\CustomFields\BasicEditorField;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Barryvdh\Debugbar\Facades\Debugbar;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $modelLabel = 'Prodotto';
    protected static ?string $pluralModelLabel = 'Prodotti';
    protected static ?string $navigationLabel = 'Prodotti';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Scheda prodotto')
                    ->schema([
                        TextInput::make('title')
                            ->label('Nome prodotto')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Forms\Set $set, $state, Forms\Get $get) {
                                if (!$get('slug')) {
                                    $set('slug', Str::slug($state));
                                }
                            }),
                        TextInput::make('slug')
                            ->helperText('sarà la parte finale dell\'URL del prodotto')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('sku')
                            ->label('SKU')
                            ->maxLength(255),
                        TextInput::make('category')
                            ->label('Categoria')
                            ->helperText('apparirà sotto il nome del prodotto')
                            ->maxLength(255),
                        TextInput::make('price')
                            ->label('Prezzo')
                            ->required()
                            ->numeric()
                            ->default(0.00)
                            ->prefix('€'),
                        Forms\Components\Select::make('related_products')
                            ->label('Prodotti correlati')
                            ->multiple()
                            ->maxItems(2)
                            ->options(fn () => Product::all()->pluck('title', 'id')->toArray())
                            ->helperText('massimo 2 prodotti'),
                        Forms\Components\FileUpload::make('image')
                            ->label('Immagine del prodotto')
                            ->directory('products')
                            ->image()
                            ->multiple(false)
                            ->imagePreviewHeight(250)
                            ->maxSize(1024) // KB
                            ->required()
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file, Forms\Get $get): string => (string) str($get('slug') . '-' . uniqid() . '.')
                                    ->append($file->getClientOriginalExtension()),
                            )
                            ->deleteUploadedFileUsing(function ($file) {
                                // cancella il vecchio file se esiste
                                Storage::disk()->delete($file);
                            })
                            ->visibility('public')

                    ])
                    ->columns(3),
                Section::make('Prezzi prodotto')
                    ->collapsible()
                    ->schema([
                        // create a form fields for the product variants
                        Forms\Components\Repeater::make('variants')
                            ->relationship()
                            ->reorderable()
                            ->label('')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Titolo')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('unit_price')
                                    ->label('Prezzo unitario')
                                    ->required()
                                    ->numeric()
                                    ->default(0.00)
                                    ->prefix('€'),
                                TextInput::make('from_qty')
                                    ->label('Quantità minima')
                                    ->required()
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(1),
                                Forms\Components\Toggle::make('enable_customization')
                                    ->label('Abilita personalizzazione')
                                    ->default(false)
                                    ->inline(),
                            ])
                            ->addActionLabel("Aggiungi prezzo")
                            ->collapsible()
                            ->columns(3),
                    ]),
                Forms\Components\Split::make([
                    Section::make('Dettagli prodotto')
                        ->schema([
                            BasicEditorField::richEditorWithBasicToolbar('description')
                                ->label('Descrizione'),
                            BasicEditorField::richEditorWithBasicToolbar('ingredients')
                                ->label('Ingredienti'),
                        ]),
                    Section::make('Focus')
                        ->schema([
                            TextInput::make('focus_title')
                                ->label('Titolo sezione focus')
                                ->maxLength(255),
                            BasicEditorField::richEditorWithBasicToolbar('focus_description')
                                ->label('Contenuto del focus'),
                            Forms\Components\FileUpload::make('focus_image')
                                ->directory('focus')
                                ->image()
                                ->multiple(false)
                                ->preserveFilenames()
                                ->imagePreviewHeight(120)
                                ->maxSize(1024)
                                ->deleteUploadedFileUsing(function ($file) {
                                    // cancella il vecchio file se esiste
                                    Storage::disk()->delete($file);
                                })
                                ->visibility('public')
                        ])
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->width(80)->height(60),
                TextColumn::make('title')
                    ->label('Nome prodotto')
                    ->description(fn(Product $product) => $product->sku)
                    ->searchable(['title', 'sku'])
                    ->weight('font-bold'),
                TextColumn::make('category')
                    ->label('Categoria')
                    ->searchable()
                    ->grow(false),
                TextColumn::make('price')
                    ->label('Prezzo')
                    ->numeric(decimalPlaces: 2)
                    ->money('EUR')
                    ->sortable()
                    ->grow(false),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
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

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 1,
                    'lg' => 3
                ])
                    ->schema([
                        Section::make()
                            ->columnSpan(2)
                            ->schema([
                                Forms\Components\TextInput::make('nama_produk')
                                            ->label('Nama Produk')
                                            ->required(),
                                Section::make()
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('kategori')
                                            ->label('Kategori')
                                            ->required(),
                                        Forms\Components\TextInput::make('harga')
                                            ->label('Harga')
                                            ->numeric()
                                            ->minValue(0)
                                            ->required(),
                                        Forms\Components\TextInput::make('harga_tertinggi')
                                            ->label('Harga Tertinggi')
                                            ->numeric()
                                            ->minValue(0),
                                        Forms\Components\TextInput::make('detail_harga')
                                            ->label('Detail Harga')
                                            ->required(),
                                        Forms\Components\TextInput::make('spesifikasi')
                                            ->label('Spesifikasi'),
                                        Forms\Components\TextInput::make('stok')
                                            ->label('Stok')
                                            ->numeric()
                                            ->minValue(0)
                                            ->step(1)
                                            ->default(0),
                                    ]),
                                Section::make()
                                    ->columns(1)
                                    ->schema([
                                        Forms\Components\RichEditor::make('deskripsi')
                                            ->label('Deskripsi'),
                                    ]),
                            ]),
                        Section::make()
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\Checkbox::make('is_sale')
                                    ->label('Sale'),
                                Forms\Components\FileUpload::make('gambar')
                                    ->label('Gambar')
                                    ->image(),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->height(80),
                Tables\Columns\TextColumn::make('nama_produk')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga_tertinggi')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('detail_harga')
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

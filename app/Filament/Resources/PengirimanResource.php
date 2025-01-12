<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengirimanResource\Pages;
use App\Filament\Resources\PengirimanResource\RelationManagers;
use App\Models\Pengiriman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengirimanResource extends Resource
{
    protected static ?string $model = Pengiriman::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('no_resi')
                            ->required(),
                        Forms\Components\TextInput::make('biaya_pengiriman')
                            ->numeric()
                            ->required(),
                        Forms\Components\Select::make('status_pengiriman')
                            ->options([
                                'pending' => 'Pending',
                                'selesai' => 'Selesai'
                            ])
                            ->required(),
                        Forms\Components\DatePicker::make('waktu_pengiriman')
                            ->required(),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_resi'),
                Tables\Columns\TextColumn::make('biaya_pengiriman')
                    ->money('IDR'),
                Tables\Columns\TextColumn::make('status_pengiriman'),
                Tables\Columns\TextColumn::make('waktu_pengiriman')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('order.user.name')
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('order.user.no_telepon')
                    ->label('Telepon'),
                Tables\Columns\TextColumn::make('order.total_harga')
                    ->money('IDR')
                    ->label('Total Harga'),
                Tables\Columns\TextColumn::make('metode_pengiriman'),

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
            'index' => Pages\ListPengirimen::route('/'),
            // 'create' => Pages\CreatePengiriman::route('/create'),
            'edit' => Pages\EditPengiriman::route('/{record}/edit'),
        ];
    }
}

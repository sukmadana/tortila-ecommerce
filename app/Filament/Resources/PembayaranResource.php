<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;
use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.id')
                    ->label('ID Order'),
                Tables\Columns\TextColumn::make('order.user.name')
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('order.user.no_telepon')
                    ->label('Telepon'),
                Tables\Columns\TextColumn::make('order.total_harga')
                    ->label('Total Harga')
                    ->money('IDR'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Pembayaran')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('order.pengiriman.no_resi')
                    ->label('No Resi'),
                Tables\Columns\TextColumn::make('order.pengiriman.biaya_pengiriman')
                    ->label('Biaya Pengiriman')
                    ->money('IDR'),
                Tables\Columns\TextColumn::make('jumlah_pembayaran')
                    ->label('Jumlah Pembayaran')
                    ->money('IDR')
                    ->state(function (Pembayaran $record) {
                        $total = $record->order->total_harga + $record->order->pengiriman->biaya_pengiriman;
                        $record->jumlah_pembayaran = $total;
                        return $record->jumlah_pembayaran;
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPembayarans::route('/'),
            // 'create' => Pages\CreatePembayaran::route('/create'),
            // 'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}

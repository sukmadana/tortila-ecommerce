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
use Filament\Infolists\Infolist;
use Filament\Infolists;


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('id'),
                Infolists\Components\TextEntry::make('user.name')
                    ->label('Nama'),
                Infolists\Components\TextEntry::make('user.no_telepon')
                    ->label('Telepon'),
                Infolists\Components\TextEntry::make('total_harga')
                    ->label('Total Harga'),
                Infolists\Components\TextEntry::make('status')
                    ->label('Status'),
                Infolists\Components\TextEntry::make('created_at')
                    ->label('Tanggal Pesanan')
                    ->date(),
                Infolists\Components\RepeatableEntry::make('order_details')
                    ->schema([
                        Infolists\Components\TextEntry::make('nama_produk'),
                        Infolists\Components\TextEntry::make('harga_produk')
                        ->label('Harga')
                        ->money('IDR'),
                        Infolists\Components\TextEntry::make('quantity'),
                        Infolists\Components\TextEntry::make('subtotal')
                        ->money('IDR'),
                    ])
                    ->columns(2)
                    ->label('Detail Pesanan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.no_telepon')
                    ->label('Telepon'),
                Tables\Columns\TextColumn::make('total_harga')
                    ->label('Total Harga')
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'proses' => 'Proses',
                        'selesai' => 'Selesai',
                    ])
                    ->sortable()
                    ->selectablePlaceholder(true)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'view' => Pages\ViewOrder::route('/{record}'),
            // 'create' => Pages\CreateOrder::route('/create'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}

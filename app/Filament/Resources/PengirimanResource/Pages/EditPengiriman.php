<?php

namespace App\Filament\Resources\PengirimanResource\Pages;

use App\Filament\Resources\PengirimanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengiriman extends EditRecord
{
    protected static string $resource = PengirimanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

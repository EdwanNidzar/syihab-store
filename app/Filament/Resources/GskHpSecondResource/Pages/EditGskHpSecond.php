<?php

namespace App\Filament\Resources\GskHpSecondResource\Pages;

use App\Filament\Resources\GskHpSecondResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGskHpSecond extends EditRecord
{
    protected static string $resource = GskHpSecondResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

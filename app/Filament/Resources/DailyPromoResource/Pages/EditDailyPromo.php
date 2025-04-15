<?php

namespace App\Filament\Resources\DailyPromoResource\Pages;

use App\Filament\Resources\DailyPromoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDailyPromo extends EditRecord
{
    protected static string $resource = DailyPromoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

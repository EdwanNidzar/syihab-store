<?php

namespace App\Filament\Resources\DailyPromoResource\Pages;

use App\Filament\Resources\DailyPromoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDailyPromos extends ListRecords
{
    protected static string $resource = DailyPromoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

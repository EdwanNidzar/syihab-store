<?php

namespace App\Filament\Resources\PricesListResource\Pages;

use App\Filament\Resources\PricesListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPricesList extends EditRecord
{
    protected static string $resource = PricesListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

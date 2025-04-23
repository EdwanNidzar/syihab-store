<?php

namespace App\Filament\Resources\PricesListResource\Pages;

use App\Filament\Resources\PricesListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPricesLists extends ListRecords
{
    protected static string $resource = PricesListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

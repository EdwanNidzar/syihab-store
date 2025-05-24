<?php

namespace App\Filament\Resources\GskProductDisplayResource\Pages;

use App\Filament\Resources\GskProductDisplayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGskProductDisplays extends ListRecords
{
    protected static string $resource = GskProductDisplayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\GskHpSecondResource\Pages;

use App\Filament\Resources\GskHpSecondResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGskHpSeconds extends ListRecords
{
    protected static string $resource = GskHpSecondResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

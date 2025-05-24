<?php

namespace App\Filament\Resources\GskTipeResource\Pages;

use App\Filament\Resources\GskTipeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGskTipes extends ListRecords
{
    protected static string $resource = GskTipeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

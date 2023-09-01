<?php

namespace App\Filament\Resources\ClientInventoryResource\Pages;

use App\Filament\Resources\ClientInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageClientInventories extends ManageRecords
{
    protected static string $resource = ClientInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getHeading(): string
    {
        return __('Equipamentos');
    }
    
}

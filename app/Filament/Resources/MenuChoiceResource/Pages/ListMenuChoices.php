<?php

namespace App\Filament\Resources\MenuChoiceResource\Pages;

use App\Filament\Resources\MenuChoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenuChoices extends ListRecords
{
    protected static string $resource = MenuChoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

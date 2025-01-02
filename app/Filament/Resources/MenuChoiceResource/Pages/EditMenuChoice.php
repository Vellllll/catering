<?php

namespace App\Filament\Resources\MenuChoiceResource\Pages;

use App\Filament\Resources\MenuChoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMenuChoice extends EditRecord
{
    protected static string $resource = MenuChoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

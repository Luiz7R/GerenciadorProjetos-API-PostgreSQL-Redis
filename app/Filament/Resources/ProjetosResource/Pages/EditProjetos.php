<?php

namespace App\Filament\Resources\ProjetosResource\Pages;

use App\Filament\Resources\ProjetosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjetos extends EditRecord
{
    protected static string $resource = ProjetosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

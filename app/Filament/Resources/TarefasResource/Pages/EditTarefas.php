<?php

namespace App\Filament\Resources\TarefasResource\Pages;

use App\Filament\Resources\TarefasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTarefas extends EditRecord
{
    protected static string $resource = TarefasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

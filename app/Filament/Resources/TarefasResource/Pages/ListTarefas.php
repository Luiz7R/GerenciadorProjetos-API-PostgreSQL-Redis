<?php

namespace App\Filament\Resources\TarefasResource\Pages;

use App\Filament\Resources\TarefasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTarefas extends ListRecords
{
    protected static string $resource = TarefasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

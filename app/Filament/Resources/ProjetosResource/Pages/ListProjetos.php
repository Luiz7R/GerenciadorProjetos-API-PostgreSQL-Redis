<?php

namespace App\Filament\Resources\ProjetosResource\Pages;

use App\Filament\Resources\ProjetosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjetos extends ListRecords
{
    protected static string $resource = ProjetosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Widgets\Dashboard;

use App\Models\Projetos;
use App\Models\Tarefa;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\DoughnutChartWidget;

class ProjetoContador extends BaseWidget
{
    protected function getCards(): array
    {
        $projetosAtivosContador = Projetos::where('ativo', 1)->get()->count();;
        $tarefasAtivas = Tarefa::where('concluida', 0)->get()->count();

        
        return [
            Card::make('Projetos Ativos: ', $projetosAtivosContador)
                ->icon('heroicon-o-document')
                ->description('Quantidade de Projetos que estão ativos')
                ->descriptionColor('success')
                ->color('primary')
                ->chart([2, 10, 3, 12, 1, 14, 10, 1, 2, 10])
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ]),

            Card::make('Tarefas: ', $tarefasAtivas)
                ->description('Quantidade de Tarefas que estão sendo realizadas')
                ->descriptionColor('success')
                ->color('success')
                ->chart([2, 10, 5, 12, 3, 14, 10, 4, 5, 10])
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ]),
        ];
    }
}

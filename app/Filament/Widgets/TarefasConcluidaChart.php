<?php

namespace App\Filament\Widgets;

use App\Services\ServiceTarefa;
use Filament\Widgets\PieChartWidget;
use Illuminate\Support\Facades\App;

class TarefasConcluidaChart extends PieChartWidget
{
    protected static ?string $heading = 'Tarefas Concluidas';

    protected $tarefasService;

    public function __construct()
    {
        $this->tarefasService = App::make(ServiceTarefa::class);
    }
    
    protected function getData(): array
    {
        $quantidadeTarefaPorStatus = $this->tarefasService->TarefasConcluidaSeparadaPorStatus();
        
        return [
            'labels' => $quantidadeTarefaPorStatus->map(fn ($value) => $value->nome),
            'datasets' => [
                [
                    'label' => 'Tarefas',
                    'data' => $quantidadeTarefaPorStatus->map(fn ($value) => $value->quantidadetarefas),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(30, 210, 108)',
                        'rgb(219, 154, 42)',
                        'rgb(130, 214, 42)'
                      ],
                    'hoverOffset' => 4
                ],
            ]
        ];
    }
}

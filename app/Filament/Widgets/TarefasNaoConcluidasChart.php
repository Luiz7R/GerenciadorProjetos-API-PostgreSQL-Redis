<?php

namespace App\Filament\Widgets;

use App\Services\ServiceTarefa;
use Filament\Widgets\DoughnutChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\App;

class TarefasNaoConcluidasChart extends DoughnutChartWidget
{
    protected static ?string $heading = 'Tarefas em Desenvolvimento';

    protected $tarefasService;

    public function __construct()
    {
        $this->tarefasService = App::make(ServiceTarefa::class);
    }

    protected function getData(): array
    {
        $quantidadeTarefaPorStatus = $this->tarefasService->TarefasEmAndamentoSeparadaPorStatus();

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
                        'rgb(219, 154, 42)'
                      ],
                    'hoverOffset' => 4
                ],
            ]
        ];
    }
}

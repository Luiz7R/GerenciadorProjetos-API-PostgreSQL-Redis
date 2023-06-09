<?php

namespace App\Services;

use App\Models\Tarefa;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ServiceTarefa
{

    public function __construct(
        protected Tarefa $model)
    {
    }

    public function index()
    {
        $duasHoras = 60 * 120;
        return Cache::store('redis')->remember('tarefas', $duasHoras, function() {
            return $this->model->all();
        });
    }
    public function criarTarefa($data)
    {
        return $this->model->create($data);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, $payload)
    {
        $tarefa = $this->model->findOrFail($id);
        $tarefa->update($payload);

        return $tarefa;
    }

    public function where($coluna, $valor)
    {
        return $this->model->where($coluna, $valor)->get();
    }

    public function find($array)
    {
        return $this->model->where($array)->first();
    }

    public function delete($id)
    {
        $projeto = $this->model->find($id);
        return $projeto ? $projeto->delete() : false;
    }

    public function TarefasEmAndamentoSeparadaPorStatus()
    {
        return DB::table('status')
        ->select(DB::raw('count(tarefas.id) as quantidadeTarefas, status.id, status.nome'))
        ->leftJoin('tarefas', 'status.id', '=', 'tarefas.id_status')
        ->where('concluida', '=', '0')
        ->groupBy('status.id', 'status.nome')
        ->get();
    }

    public function TarefasConcluidaSeparadaPorStatus()
    {
        return DB::table('status')
        ->select(DB::raw('count(tarefas.id) as quantidadeTarefas, status.id, status.nome'))
        ->leftJoin('tarefas', 'status.id', '=', 'tarefas.id_status')
        ->where('concluida', '=', '1')
        ->groupBy('status.id', 'status.nome')
        ->get();
    }
}
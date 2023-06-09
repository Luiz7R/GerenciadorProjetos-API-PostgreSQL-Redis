<?php

namespace App\Services;

use App\Models\PermissaoProjeto;
use App\Models\Projetos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceProjeto 
{

    use AuthorizesRequests;

    public function __construct(
        protected Projetos $model)
    {
    }

    public function index()
    {
        $umaSemana = 60 * 60 * 24 * 7;
        return Cache::store('redis')->remember('projetos', $umaSemana, function() {
            return $this->model->where([
                ['ativo', '=', '1']
            ])->get();
        });
    }

    public function store(array $payload)
    {
        return $this->model->create($payload);
    }

   /**
     * Retrieves records from the model based on column and value.
     *
     * @param string $coluna the column to search on
     * @param mixed $valor the value to search for
     */
    public function where($coluna, $valor)
    {
        return $this->model->where($coluna, $valor)->get();
    }

    public function find($id)
    {
        $array = [
            ['id', '=', $id],
            ['ativo', '=', '1']
        ];

        return $this->model->where($array)->first();
    }

    public function update($id, $payload)
    {
        $projeto = $this->model->findOrFail($id);
        $this->authorize('update', $projeto);
        $projeto->update($payload);

        return $projeto;
    }
    public function delete($id)
    {
        $projeto = $this->model->find($id);

        $this->authorize('delete', $projeto);

        return $projeto->delete();
    }
}
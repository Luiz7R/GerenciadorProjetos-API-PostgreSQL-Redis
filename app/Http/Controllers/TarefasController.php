<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTarefasRequest;
use App\Http\Requests\UpdateTarefasRequest;
use App\Http\Resources\TarefasResource;
use App\Services\ServiceTarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{

    protected $tarefaService;

    public function __construct(ServiceTarefa $tarefaService)
    {
        $this->tarefaService = $tarefaService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->tarefaService->where('id_usuario', auth()->user()->id);

        if ( $data->isEmpty() ) 
        {
            return response()->json('Nenhuma tarefa cadastrada para esse usuário.', 404);
        }

        return response()->json(TarefasResource::collection($data), 201);
    }

    /**
     * Show the form for creating a new resource.
     */

     // TODO: método para criar uma tarefa usando LARAVEL, a tarefa deve ter os campos: titulo,descrição,status,data de entrega, id projeto e id usuário
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTarefasRequest $request)
    {
        $request->merge(['id_usuario' => auth()->user()->id]);
        $tarefa = $this->tarefaService->criarTarefa($request->all());

        return $tarefa ?
            response()->json([
                'message' => 'Tarefa criada com successo',
                'task' => TarefasResource::make($tarefa)
            ], 201)
        :
            response()->json([
                'message' => 'Erro ao criar tarefa'
            ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tarefa = $this->tarefaService->find([
            ['id', '=', $id],
            ['id_usuario', '=', auth()->user()->id]
        ]);

        return response()->json(TarefasResource::make($tarefa), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tarefa = $this->tarefaService->update($id, $request->all());

        return response()->json(TarefasResource::make($tarefa), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deletar = $this->tarefaService->delete($id);

        if ( $deletar ) 
        {
            return response()->json('Tarefa deletada com sucesso', 200);
        }
 
        return response()->json('Erro ao deletar o Tarefa, verifique se existe', 400);
    }

    public function TarefasEmAndamentoSeparadaPorStatus()
    {
        return $this->tarefaService->TarefasEmAndamentoSeparadaPorStatus();
    }
    
    public function TarefasConcluidaSeparadaPorStatus()
    {
        return $this->tarefaService->TarefasConcluidaSeparadaPorStatus();
    }
}

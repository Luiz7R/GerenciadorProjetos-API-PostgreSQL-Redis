<?php

namespace App\Http\Controllers;

use App\Models\Projetos;
use App\Http\Requests\StoreProjetosRequest;
use App\Http\Requests\UpdateProjetosRequest;
use App\Http\Resources\ProjetosResource;
use App\Services\ServiceProjeto;

class ProjetosController extends Controller
{

    private $service;

    public function __construct(ServiceProjeto $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProjetosResource::collection($this->service->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjetosRequest $request)
    {
        $payload = $request->validated();
        $projeto = $this->service->store($payload);

        return $projeto ? 
               response()->json([
                'message' => 'Projeto criado com sucesso',
                'projeto' => ProjetosResource::make($projeto)
               ], 201) 
               : response()->json('Erro ao cadastrar o Projeto', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $projeto = $this->service->find($id);

        return $projeto ? response()->json(ProjetosResource::make($projeto), 200)
        : response()->json('Verifique se esse projeto existe, ou se tem acesso a ele', 400);
    }

   /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjetosRequest $request,$id)
    {
        $projeto = $this->service->update($id, $request->all());

        return response()->json(ProjetosResource::make($projeto), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deletar = $this->service->delete($id);

        if ( $deletar ) 
        {
            return response()->json('Projeto deletado com sucesso', 200);
        }
 
        return response()->json('Erro ao deletar o Projeto, verifique se existe', 400);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StatusResource::collection(Status::where('ativo', "1")->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = [
            'nome' => $request->nome,
            'ativo' => '1'
        ];
        
        $status = Status::create($payload);

        if ( $status )
        {
            return response()->json(StatusResource::make($status), 201);
        }

        return response()->json('Erro ao cadastrar o Status', 500);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Status::where([
            'id' => $id,
            'ativo' => '1'
        ])->first();
        
        if ( !$data ) 
        {
            return response()->json('Nenhum Status encontrado.', 404);
        }

        return response()->json(StatusResource::make($data), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);
        $status->update($request->all());

        return response()->json(StatusResource::make($status), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $deletar = Status::find($id);

       try 
       {
            if ( !$deletar ) 
            {
                return response()->json('Nenhum Status encontrado.', 404);
            }

            $deletar->delete();
            return response()->json('Status deletado com sucesso', 200);
       } 
       catch (\Illuminate\Database\QueryException $e)
       {
            return response()->json('Erro ao deletar o Status, existem projetos relacionados', 400);
       }

    }
}

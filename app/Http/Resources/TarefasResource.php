<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TarefasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'id_status' => $this->id_status,
            'data_conclusao' => $this->data_conclusao,
            'prioridade' => $this->prioridade,
            'id_projeto' => $this->id_projeto,
            'id_usuario' => $this->id_usuario
        ];
    }
}

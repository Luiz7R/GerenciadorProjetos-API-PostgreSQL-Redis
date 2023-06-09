<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjetosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'id_status' => $this->id_status,
            'data_entrega' => $this->data_entrega,
            'ativo' => $this->ativo,
            'id_usuario' => $this->id_usuario
        ];
    }
}

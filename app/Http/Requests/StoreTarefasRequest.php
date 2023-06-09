<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTarefasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id_status' => 'required|exists:status,id',
            'id_projeto' => 'required|exists:projetos,id',
            'descricao' => 'required',
            'prioridade' => 'required',
            'titulo' => 'required',
            'data_conclusao' => 'required|date'
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'id_status',
        'data_conclusao',
        'prioridade',
        'id_projeto',
        'id_usuario',
        'concluida'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function projeto()
    {
        return $this->belongsTo(Projetos::class, 'id_projeto');
    }
}

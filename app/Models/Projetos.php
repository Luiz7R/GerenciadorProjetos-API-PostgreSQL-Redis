<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Projetos extends Model
{
    use HasFactory;

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'descricao',
        'id_status',
        'data_entrega',
        'ativo',
        'id_usuario'
    ];

    /**
     * The "booted" method of the model.
     */
    public static function boot()
    {
        parent::boot();

        
        static::creating(function($model) {
            $model->id_usuario == null ?? Auth::id();

            Cache::forget('projetos');
        });

        static::updated(function() {
            Cache::forget('projetos');
        });

        static::deleted(function() {
            Cache::forget('projetos');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}

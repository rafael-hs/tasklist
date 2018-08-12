<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [
        'id',
        'nomeTarefa',
        'custo',
        'dataLimite',
        'ordemApresentacao'
    ];

    protected $table = 'tarefas';
}

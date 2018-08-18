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

    public $rules = [
       'nomeTarefa'=> 'required|unique:tarefas|min:3|max:100',
         'custo'     => 'required|numeric',
        'dataLimite'=> 'required|date'
      ];

    protected $table = 'tarefas';
}

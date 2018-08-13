<?php

namespace App\Http\Controllers;

use App\Tarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{

    private $tarefa;
    
    

    public function __construct()
    {
       tarefa = new Tarefa();
    }

    public function index()
    {
        $list_tarefas = Tarefa::all();
        return view('tarefasView.index',[
            'tarefas'=> $list_tarefas
        ]);
    }

    public function novoView(){
        return view('tarefasView.create');
    }

    public function store(Request $request, Tarefa $tarefas)
    {   
        $nregistros = Tarefa::count();
        $tarefas->nomeTarefa = $request->nomeTarefa;
        $tarefas->custo = $request->custo;
        $tarefas->dataLimite = $request->dataLimite;
        $tarefas->ordem = $nregistros+1;
        $tarefas->save();
        
        
        return redirect("/tarefas")->with("message", "Tarefa criada com sucesso");
        
    }

    public function editarView($id)
    {
        var_dump(tarefa->find($id)->nome);
    }
}

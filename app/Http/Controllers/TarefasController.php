<?php

namespace App\Http\Controllers;

use App\Tarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{

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
        //validação
        $validacao = new Tarefa;
        $this->validate($request, $validacao->rules);    
        $nregistros = Tarefa::count();
        $tarefas->nomeTarefa = $request->nomeTarefa;
        $tarefas->custo = $request->custo;
        $tarefas->dataLimite = $request->dataLimite;
        $tarefas->ordem = NULL;     
        $tarefas->save();
        $tarefas->ordem=$tarefas->id;
        $tarefas->save();
        return redirect("/tarefas")->with("message", "Tarefa criada com sucesso");
    }

    public function editarView($id)
    {
        //recuperar a minha tarefa pelo seu id
       $tarefa =Tarefa::find($id);
       return view('tarefasView.edit',['tarefa'=>$tarefa]);
    }

    public function update(Request $request, $id)
    {
        
        $dataForm = $request->all();
        $validacao = new Tarefa;
        $this->validate($request, $validacao->rules);  
        $tarefa = Tarefa::find($id);
       
        
        $update = $tarefa->update($dataForm);
       
            return redirect('tarefas');
        
        
    }

    public function delete($id)
    {
        $tarefa = Tarefa::find($id);
        $delete = $tarefa->delete();

        if($delete)
        {
            return redirect("/tarefas")->with("message", "Tarefa deletada com sucesso");
        }
        else
        {
            return 'Falha ao deletar';
            return redirect('tarefas');
        }

    }

}

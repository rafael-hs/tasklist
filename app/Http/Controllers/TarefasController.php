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
        //recuperar a minha tarefa pelo seu id
       $tarefa =Tarefa::find($id);
       return view('tarefasView.edit',['tarefa'=>$tarefa]);
    }

    public function update(Request $request, $id)
    {
        $confere="";
        $dataForm = $request->all();
        $tarefa = Tarefa::find($id);
       
        if(Tarefa::where('nomeTarefa',$request->nomeTarefa)->count()==1){
            return redirect('tarefas/')->with(['errors'=>'Já existe essa tarefa na base de dados, favor escolher outro nome']);
        }else{
        $update = $tarefa->update($dataForm);
        if($update)
        {
            return redirect('tarefas');
        }
        else{
            return redirect('tarefas/{id}/editaedit', $id)->with(['errors'=> 'Falha ao editar']);
            }
        }
    }

}

@extends("template.app")
@section("content")
<div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <div class="titulo">
                <h1>Lista de Tarefas</h1>
            </div>
            <div class="btn-group" role="group" aria-label="...">
                <a href="{{url('tarefas/novo')}}"><button type="button" class="btn btn-default glyphicon glyphicon-plus">Nova-tarefa</button></a>
            </div>
                <div class="titulo-lista">
                    <h4>ID|Nome|Custo|Data Limite</h4>
                </div>
                @foreach($tarefas as $tarefas)
            <div class="panel panel-default" id="lista">
            <div class="panel-body">
                {{$tarefas->id}}|  {{$tarefas->nomeTarefa}}|{{$tarefas->custo}}|{{$tarefas->dataLimite}}
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-default glyphicon glyphicon-trash" ></button>
                       <a href="{{url("/tarefas/$tarefas->id/editar")}}"> <button type="button" class="btn btn-default glyphicon glyphicon-pencil"></button> </a>
                    </div>
            </div>
            </div>  
                
                @endforeach
         </table>
    </div> 
           
    
    
    <script>
        $('#lista').sortable();
    </script>
</div>
@endsection
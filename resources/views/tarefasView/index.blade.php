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
                    <div class="editandodados"></div>
                    {{$tarefas->id}} |  {{$tarefas->nomeTarefa}} | {{$tarefas->custo}} | {{$tarefas->dataLimite}}
                    <div class="btn-group" role="group" aria-label="...">
                  <a href="{{url("/tarefas/$tarefas->id/editar")}}"> <button type="button" nome="editar" class="btn btn-primary glyphicon glyphicon-pencil" ></button> </a>
                  <!--data-toggle="modal"  data-target="#exampleModal" data-whatever="@mdo  {{url("/tarefas/$tarefas->id/editar")}}-->
                    <button type="button" nome="apagar" class="btn btn-default glyphicon glyphicon-trash" ></button>
                </div>
            </div>
            </div>
                @endforeach
         
    </div> 
           
    
    <script>
    $(function(){
        $('.form').submit(function(){
            $.ajax({
            url:'edit.blade.php',
            type:'POST',
            data:$('.form').serialize(),
            success>function(data){
                if(data != ''){
                    $('.editandodados').html(data);
                }else{
                    alert('campos em branco')
                }
            }
         });
        });
    });
         
    </script>
    <script>
        $('#lista').sortable();
    </script>
</div>
@endsection
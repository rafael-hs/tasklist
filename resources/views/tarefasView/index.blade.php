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
                  <a href="{{url("/tarefas/$tarefas->id/editar")}}"> <button type="button" nome="editar" class="btn btn-primary glyphicon glyphicon-pencil"></button> </a>
                  <!--data-toggle="modal"  data-target="#exampleModal" data-whatever="@mdo-->
                    <button type="button" nome="apagar" class="btn btn-default glyphicon glyphicon-trash" ></button>
                    </div>
            </div>
            </div>
                @endforeach
         
    </div> 
           
    
    <script>
         $('#tarefamodal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
        })
    </script>
    <script>
        $('#lista').sortable();
    </script>
</div>
@endsection
@extends("template.app")
@section("content")
<div>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
            <div class="titulo">
                <h1>Lista de Tarefas</h1>
            </div>
            
                <div class="titulo-lista">
                    <h4>ID|Nome|Custo|Data Limite</h4>
                </div>
                
                    <ul class="list-group" style="" id="lista">
                    @foreach($tarefas as $tarefas)  
                    @if($tarefas->custo >= 1000)             
                        <li class="list-group-item" style="background:#EEDD82;" id="{{$tarefas->id}}"> 
                    @else
                        <li class="list-group-item" id="{{$tarefas->id}}">
                    @endif
                    {{$tarefas->id}} |  {{$tarefas->nomeTarefa}} | {{$tarefas->custo}} | {{$tarefas->dataLimite}}
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" nome="editar" class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#edit" data-tarefaid="{{$tarefas->id}}" 
                        data-tarefanome="{{$tarefas->nomeTarefa}}" data-tarefacusto="{{$tarefas->custo}}" data-tarefadata="{{$tarefas->dataLimite}}" ></button> 
                    <!-- data-toggle="modal" data-target="#exampleModal" data-whateverid="{{$tarefas->id}}" data-whatever="{{$tarefas->nomeTarefa}}" data-whatevercusto="{{$tarefas->custo}}" data-whateverdata="{{$tarefas->dataLimite}}" {{url("/tarefas/$tarefas->id/editar")}}-->
                        <a href="{{url("/tarefas/$tarefas->id/delete")}}" onclick="return confirm('Deseja realmente deletar??')">  <button type="button" nome="apagar" class="btn btn-default glyphicon glyphicon-trash" ></button> </a>
                        <!--{{url("/tarefas/$tarefas->id/delete")}}-->  </li>
                    @endforeach
                    </ul>
                    
            </div>
            

                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" name="nameid2" id="recipientid2"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url("tarefas/update")}}" method="POST">
                        {!! method_field('PUT') !!}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nome:</label>
                            <input name="nomeTarefa" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Custo:</label>
                            <input name="custo" type="text" class="form-control" id="recipient-custo">
                        </div>
                        <div class="form-group">
                            <label for="message-text2" class="control-label">Data Limite:</label>
                            <input name="dataLimite" type="text2" class="form-control" id="recipient-data">
                        </div>
                        <input type="hidden" name="id" id="recipientid" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Editar</button>
                    </div>
                        </form>
                    </div>
                    
                    </div>
            </div>
        </div>
    </div> 
           
    <div class="btn-group" role="group" aria-label="...">
        <a href="{{url('tarefas/novo')}}"><button type="button" class="btn btn-default glyphicon glyphicon-plus">Nova-tarefa</button></a>
    </div>
    <script>
    $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var recipient = button.data('tarefanome')
    var recipientcusto = button.data('tarefacusto')
    var recipientdata = button.data('tarefadata')
    var recipeid = button.data('tarefaid')
     
    var modal = $(this)
    modal.find('.modal-title').text('Editar tarefa id:'+recipeid)
    modal.find('#recipient-name').val(recipient)
    modal.find('#recipient-custo').val(recipientcusto)
    modal.find('#recipient-data').val(recipientdata)
    modal.find('#recipientid').val(recipeid)
    })
    </script>
    
    <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $(function(){
        $('#lista').sortable({
            stop: function(){
                $.map($(this).find('li'), function(el){
                    var tarefaId = el.id;
                    var tarefaIndex = $(el).index();
                    
                    
                    $.ajax({
                        url:'/tarefas',
                        type: 'POST',
                        dataType:'json',
                        data: {tarefaId: tarefaId, tarefaIndex: tarefaIndex,},
                          })
                    });

                }
            });
        });
    </script>
</div>
@endsection
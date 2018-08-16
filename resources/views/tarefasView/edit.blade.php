@extends("template.app")

@section("content")
    <div class="col-md-12">
        <h3>Editar tarefa<h3>
        <a href="{{url('tarefas/')}}"><button style="margin-top: 5px; " class="btn btn-primary">Voltar</button></a>
    </div>
    
    <div class="recebeDados col-md-6 well">
        <form class="col-md-12" action="{{url("tarefas/$tarefa->id/update")}}" method="POST">
        <!--{{url("tarefas/$tarefa->id/update")}}-->
        {!! method_field('PUT') !!}
        {{csrf_field()}}
            <div class="form-group">
                <label class="control-label">Nome da tarefa:</label>
                <input type="text" name="nomeTarefa" class="col-md-12 form-control" placeholder="Nome da tarefa" value="{{$tarefa->nomeTarefa}}">
            </div>
            <div class="form-group">
                <label class="control-label">Custo:</label>
                <input type="text" name="custo" class="col-md-12 form-control"placeholder="Custo" value="{{$tarefa->custo}}">
            </div>
            <div class="form-group">
                <label class="control-label">Data Limite:</label>
                <input type="text" name="dataLimite" class="col-md-12 form-control"placeholder="Data de Limite" value="{{$tarefa->dataLimite}}">
            </div>
            <button style="margin-top: 5px; float:right;" class="btn btn-primary">Editar</button>
            
        </form>
        
    </div>
@endsection
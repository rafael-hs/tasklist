@extends("template.app")

@section("content")
<div class="col-md-12">
    <h3>Nova tarefa<h3>
    @if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>

    @endif
    <a href="{{url('tarefas/')}}"><button style="margin-top: 5px; " class="btn btn-primary">Voltar</button></a>
</div>
    
<div class="col-md-6 well">
    <form class="col-md-12" action="{{url('tarefas/store')}}" method="POST">
    {{csrf_field()}}
        <div class="form-group">
            <label class="control-label">Nome da tarefa:</label>
            <input type="text" name="nomeTarefa" class="col-md-12 form-control" placeholder="Nome da tarefa" value="{{old('nomeTarefa')}}">
        </div>
        <div class="form-group">
            <label class="control-label">Custo:</label>
            <input type="text" name="custo" class="col-md-12 form-control"placeholder="Custo" value="{{old('custo')}}">
        </div>
        <div class="form-group">
            <label class="control-label">Data Limite:</label>
            <input type="date" name="dataLimite" class="col-md-12 form-control date-mask" placeholder="00/00/0000" value="{{old('dataLimite')}}">
        </div>
        <button style="margin-top: 5px; float:right;" class="btn btn-primary">Salvar</button>
        
    </form>
    
</div>
@endsection
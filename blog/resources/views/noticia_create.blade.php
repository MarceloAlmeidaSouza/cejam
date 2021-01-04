
@extends('templates.index')
@section('noticia_create')
<h1 class="text-center badge-info">@if(isset($noticia)) Editar @else Cadastrar @endif</h1>
@if(isset($errors) && count($errors) > 0)
  <div class='text-center mt-4 mb-4 p-2 alert-danger'>
    @foreach($errors->all() as $erro)
      {{$erro}}<br />
    @endforeach
  </div>
@endif
@if(isset($categoria_selecionado))
  <form action="{{url("/noticia/$noticia->id")}}" method="post" name="cad_noticia">
  @method("PUT")
@else
  <form action="{{url("/noticia")}}" method="post" name="cad_noticia">
@endif

  @csrf
<form>
  <div class="form-group">
    <div class="form-group col-md-4">
      <label for="inputTitle">Título</label>
      <input type="text" class="form-control" name="title" id="inputTitle" placeholder="Titulo" value="{{$noticia->title ?? ''}}">
    </div>
  </div>
  <div class="form-group">
    <label for="textareaDescription">Descrição</label>
    <textarea class="form-control col-md-8" name="description" id="textareaDescription" rows="3">{{$noticia->description ?? ''}}</textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputAutor">Autor</label>
      <select id="inputAutor" class="form-control" name="autor_id" id="autor_id">
        @if(!isset($autor_selecionado))
          <option selected>Selecione</option>
        @endif
        @foreach($autores as $autor)
          @if(isset($autor_selecionado) && $autor->id == $autor_selecionado->id)
            <option value="{{$autor->id}}" selected>
              @else
            <option value="{{$autor->id}}">
          @endif
          {{$autor->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputCategoria">Categoria</label>
      <select id="inputCategoria" class="form-control" name="categoria_id" id="categoria_id">
        @if(!isset($categoria_selecionado))
          <option selected>Selecione</option>
        @endif
        @foreach($categorias as $categoria)
              @if(isset($categoria_selecionado) && $categoria->id == $categoria_selecionado->id)
                <option value="{{$categoria->id}}" selected>
                  @else
                <option value="{{$categoria->id}}">
              @endif
              {{$categoria->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
@endsection

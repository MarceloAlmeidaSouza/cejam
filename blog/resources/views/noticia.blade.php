@extends('templates.index')
@section('noticia')
@csrf
<table class="table table-bordered table-striped" id='table-noticia'>
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Descrição</th>
      <th scope="col">Autor</th>
      <th scope="col">Categoria</th>
      <th scope="col">Criado em</th>
      <th scope="col">Atualizado em</th>
      <th scope="col" class="text-center">Açoes</th>
    </tr>
  </thead>
  <tbody>
    @foreach($noticias as $noticia)
    @php
    $autor = $noticia->find($noticia->id)->autor;
    $categoria = $noticia->find($noticia->id)->categoria;
    @endphp

      <tr>
        <th scope="row">{{$noticia->id}}</th>
        <td>{{$noticia->title}}</td>
        <td>{{$noticia->description}}</td>
        <td>{{$autor->name}}</td>
        <td>{{$categoria->name}}</td>
        <td>{{$noticia->created_at}}</td>
        <td>{{$noticia->updated_at}}</td>
        <td class="text-center">
          <a href="{{url("noticia/$noticia->id/edit")}}">
            <button type="button" class="btn btn-primary">Editar</button>
          </a>
          <a href="{{url("noticia/$noticia->id")}}">
            <button type="button" class="btn btn-danger">Excluir</button>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<a href="{{url("noticia/create")}}">
  <button type="button" class="align-self-end btn btn-circle btn-primary" style="box-shadow: 0 0 6px black;width: 60px; height: 60px;position:fixed;bottom:5px;right:5px;margin:0;padding:5px 3px;border-radius:50%"><i class="fas fa-plus"></i></button>
</a>
@endsection

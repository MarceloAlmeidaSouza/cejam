@extends('templates.index')
@section('categoria')
@csrf
<table class="table table-bordered table-striped" id='table-categoria'>
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Criado em</th>
      <th scope="col">Atualizado em</th>
      <th scope="col" class="text-center">Açoes</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categorias as $categoria)
      <tr>
        <th scope="row">{{$categoria->id}}</th>
        <td>{{$categoria->name}}</td>
        <td>{{$categoria->created_at}}</td>
        <td>{{$categoria->updated_at}}</td>
        <td class="text-center">
          <a href="{{url("categoria/$categoria->id/edit")}}">
            <button type="button" class="btn btn-primary">Editar</button>
          </a>
          <a href="{{url("categoria/$categoria->id")}}">
            <button type="button" class="btn btn-danger">Excluir</button>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<a href="{{url("categoria/create")}}">
  <button type="button" class="align-self-end btn btn-circle btn-primary" style="box-shadow: 0 0 6px black;width: 60px; height: 60px;position:fixed;bottom:5px;right:5px;margin:0;padding:5px 3px;border-radius:50%"><i class="fas fa-plus"></i></button>
</a>
@endsection

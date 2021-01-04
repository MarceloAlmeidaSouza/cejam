@extends('templates.index')
@section('autor_create')
<h1 class="text-center badge-info">@if(isset($autor)) Editar @else Cadastrar @endif</h1>
@if(isset($errors) && count($errors) > 0)
  <div class='text-center mt-4 mb-4 p-2 alert-danger'>
    @foreach($errors->all() as $erro)
      {{$erro}}<br />
    @endforeach
  </div>
@endif
@if(isset($autor))
  <form action="{{url("/autor/$autor->id")}}" method="post" name="cad_autor">
  @method("PUT")
@else
  <form action="{{url("/autor")}}" method="post" name="cad_autor">
@endif

  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="inputAutor">Autor</label>
     <input type="text" class="form-control" id="inputAutor" name="name" title="Obrigatorio o preenchimento" value="{{$autor->name ?? ''}}" required pattern="[\w\W.]{2,}">
   </div>
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
@endsection

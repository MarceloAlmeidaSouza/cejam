@extends('templates.index')
@section('categoria_create')
<h1 class="text-center badge-info">@if(isset($categoria)) Editar @else Cadastrar @endif</h1>
@if(isset($errors) && count($errors) > 0)
  <div class='text-center mt-4 mb-4 p-2 alert-danger'>
    @foreach($errors->all() as $erro)
      {{$erro}}<br />
    @endforeach
  </div>
@endif
@if(isset($categoria))
  <form action="{{url("/categoria/$categoria->id")}}" method="post" name="cad_categoria">
  @method("PUT")
@else
  <form action="{{url("/categoria")}}" method="post" name="cad_categoria">
@endif

  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="inputcategoria">Categoria</label>
     <input type="text" class="form-control" id="inputcategoria" name="name" title="Obrigatorio o preenchimento" value="{{$categoria->name ?? ''}}" required pattern="[\w\W.]{2,}">
   </div>
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
@endsection

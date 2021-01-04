@extends('templates.index')
@section('blog_noticias')

@foreach($noticias as $noticia)
@php
$autor = $noticia->find($noticia->id)->autor;
$categoria = $noticia->find($noticia->id)->categoria;
@endphp
<ul class="list-group list-group-flush">
  <li class="list-group-item" style="display: flex; justify-content: center;">
    <div class="card" style="width: 50rem;">
      <div class="card-body">
        <h5 class="card-title">{{$noticia->title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted"></h6>
        <p class="card-text">{{$noticia->description}}</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Autor: {{$autor->name}}</li>
          <li class="list-group-item">Categoria: {{$categoria->name}}</li>
        </ul>
      </div>
    </div>
  </li>
</ul>
@endforeach
@endsection

@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')
<ul>
{{$autores->render()}}
@foreach($autores as $autor)
<li>
<a href="{{route('autores.show', ['ida'=>$autor->id_autor])}}">
    {{$autor->nome}}
</a></li>
@endforeach
    @if(auth()->check())  
    
    
    <a href="{{route('autores.create')}}" class="btn btn-primary">Adicionar Autor
</a>
    @endif
</ul>
@endsection
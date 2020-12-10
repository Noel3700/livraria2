@extends('layout')
<ul>
IDA: {{$autores->id_autor}}<br>
Nome: {{$autores->nome}}<br>
    @if(count($autores->livros))
        @foreach($autores->livros as $livro)
            Livros deste autor: {{$livro->titulo}}<br>
        @endforeach
    @else  
        <div class="alert alert-danger" role="alert">
            Neste autor ainda não tem livros!
        </div>
    @endif
Nome:{{$autores->nome}}<br>
Nacionalidade: {{$autores->nacionalidade}}<br>
Data de Nascimento: {{$autores->data_nascimento}}<br>
Fotografia: {{$autores->fotografia}}<br>
Created_at: {{$autores->created_at}}<br>
Updated_at: {{$autores->updated_at}}<br>
Deleted_at: {{$autores->deleted_at}}<br>
    
    @if(auth()->check())    
    <a href="{{route('autores.edit', ['ida'=>$autores->id_autor])}}" class="btn btn-primary">Editar Autor
</a>
    
    <a href="{{route('autores.delete',['ida'=>$autores->id_autor])}}" class="btn btn-primary">Eliminar Autor
</a>
    @endif
</ul>
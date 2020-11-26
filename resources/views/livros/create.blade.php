<form action="{{route('livros.store')}}" method="post">
@csrf
Título: <input type="text" name="titulo" value="{{old('titulo')}}"><br><br>
    @if ($errors->has('titulo'))  
    <b style="color:red"> Campo Obrigatório </b>
    <br><br>
    @endif
    
Idioma: <input type="text" name="idioma" value="{{old('idioma')}}"><br><br>
    @if ($errors->has('idioma'))
    Digite um idioma (min 3 palavras)
    <br><br>
    @endif
    
Total páginas: <input type="text" name="total_paginas" value="{{old('total_paginas')}}"><br><br>
    @if ($errors->has('total_paginas'))
    O mínimo de páginas é uma
    <br><br>
    @endif
    
Data Edição: <input type="date" name="data_edicao" value="{{old('data_edicao')}}"><br><br>
    @if ($errors->has('data_edicao'))
    Digite uma data
    <br><br>
    @endif
    
ISBN: <input type="text" name="isbn" value="{{old('isbn')}}"><br><br>
    @if ($errors->has('isbn'))
    Deverá indicar um ISBN correto (13 caracteres)
    <br><br>
    @endif
    
Observações: <input type="text" name="observacoes" value="{{old('observacoes')}}"><br><br>
    @if ($errors->has('observacoes'))
    Mínimo de 1 caracter
    <br><br>
    @endif
    
Imagem Capa: <input type="text" name="imagem_capa" value="{{old('imagem_capa')}}"><br><br>
    @if ($errors->has('imagem_capa'))
    ERRO
    <br><br>
    @endif
Género: <input type="text" name="id_genero" value="{{old('id_genero')}}"><br><br>
    @if ($errors->has('id_genero'))
    Digite um número
    <br><br>
    @endif
    
Autor: <input type="text" name="id_autor" value="{{old('id_autor')}}"><br><br>
    @if ($errors->has('id_autor'))
    Digite um número
    <br><br>
    @endif
    
Sinopse:<textarea  name="sinopse" value="{{old('sinopse')}}"></textarea><br><br>
    @if ($errors->has('sinopse'))
    Mínimo de 3 palavras
    <br><br>
    @endif
    
<input type="submit" name="enviar">


</form>
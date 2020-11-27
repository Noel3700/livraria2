<form action="{{route('autores.update',['ida'=>$autor->id_autor])}}" method="post">
@csrf
    @method('patch')
Nome: <input type="text" name="nome" value="{{$autor->nome}}"><br><br>
    @if ($errors->has('nome'))  
    <b style="color:red"> Campo Obrigatório </b>
    <br><br>
    @endif
    
    Nacionalidade: <input type="text" name="nacionalidade" value="{{$autor->nacionalidade}}"><br><br>
    @if ($errors->has('nacionalidade'))  
     <b style="color:black">Mínimo de 3 palavras</b> 
    <br><br>
    @endif
    
    Data de Nascimento: <input type="date" name="data_nascimento" value="{{$autor->data_nascimento}}"><br><br>
    @if ($errors->has('data_nascimento'))  
    Digite uma data
    <br><br>
    @endif
    
    Fotografia: <input type="text" name="fotografia" value="{{$autor->fotografia}}"><br><br>
    @if ($errors->has('fotografia'))  
   ERRO!!!
    <br><br>
    @endif
    
    
    
    <input type="submit" name="Editar">
    
    
    
 
    
    
</form>
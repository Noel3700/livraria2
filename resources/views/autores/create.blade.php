<form action="{{route('autores.store')}}" method="post">
@csrf
Nome: <input type="text" name="nome" value="{{old('nome')}}"><br><br>
    @if ($errors->has('nome'))  
    <b style="color:red"> Campo Obrigatório </b>
    <br><br>
    @endif
    
    Nacionalidade: <input type="text" name="nacionalidade" value="{{old('nacionalidade')}}"><br><br>
    @if ($errors->has('nacionalidade'))  
     <b style="color:black">Mínimo de 3 palavras</b> 
    <br><br>
    @endif
    
    Data de Nascimento: <input type="date" name="data_nascimento" value="{{old('nome')}}"><br><br>
    @if ($errors->has('data_nascimento'))  
    Digite uma data
    <br><br>
    @endif
    
    Fotografia: <input type="text" name="fotografia" value="{{old('fotografia')}}"><br><br>
    @if ($errors->has('fotografia'))  
   ERRO!!!
    <br><br>
    @endif
    
    
    
    <input type="submit" name="enviar">
    
    
    
    
    
    
</form>
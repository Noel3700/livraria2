<form action="{{route('generos.update',['idg'=>$genero->id_genero])}}" method="post">
@csrf
     @method('patch')
    
    
   
   
        
        
Designacao: <input type="text" name="designacao" value="{{$genero->designacao}}"><br><br>
    @if ($errors->has('designacao'))  
    <b style="color:red"> Campo Obrigatório </b>
    <br><br>
    @endif
    
    Observações: <input type="text" name="observacoes" value="{{$genero->observacoes}}"><br><br>
    @if ($errors->has('observacoes'))
    Mínimo de 1 caracter
    <br><br>
    @endif
    
    
    
    
    <input type="submit" name="enviar">
    
</form>
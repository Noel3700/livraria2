<form action="{{route('editoras.store',['ide'=>$editora->id_editora])}}" method="post">
@csrf
    @method('patch')     
Nome: <input type="text" name="nome" value="{{$editora->nome}}"><br><br>
    @if ($errors->has('nome'))  
    <b style="color:red"> Campo Obrigatório </b>
    <br><br>
    @endif
    
    Morada: <input type="text" name="morada" value="{{$editora->morada}}"><br><br>
    @if ($errors->has('morada'))
    <b style="color:black">Mínimo de 3 palavras</b> 
    <br><br>
    @endif
    
    Observações: <input type="text" name="observacoes" value="{{$editora->observacoes}}"><br><br>
    @if ($errors->has('observacoes'))
    <b style="color:black">Mínimo de 1 palavra</b> 
    <br><br>
    @endif
    
    <input type="submit" name="enviar">
    

</form>
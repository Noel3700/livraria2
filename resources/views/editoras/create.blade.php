<form action="{{route('editoras.store')}}" method="post">
@csrf
Nome: <input type="text" name="nome" value="{{old('nome')}}"><br><br>
    @if ($errors->has('nome'))  
    <b style="color:red"> Campo Obrigatório </b>
    <br><br>
    @endif
    
    Morada: <input type="text" name="morada" value="{{old('morada')}}"><br><br>
    @if ($errors->has('morada'))
    <b style="color:black">Mínimo de 3 palavras</b> 
    <br><br>
    @endif
    
    Observações: <input type="text" name="observacoes" value="{{old('observacoes')}}"><br><br>
    @if ($errors->has('observacoes'))
    <b style="color:black">Mínimo de 1 palavra</b> 
    <br><br>
    @endif
    
    <input type="submit" name="enviar">
</form>
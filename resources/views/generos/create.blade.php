<form action="{{route('livros.store')}}" method="post">
@csrf
Designacao: <input type="text" name="designacao" value="{{old('designacao')}}"><br><br>
    @if ($errors->has('designacao'))  
    <b style="color:red"> Campo Obrigatório </b>
    <br><br>
    @endif
    
    Observações: <input type="text" name="observacoes" value="{{old('observacoes')}}"><br><br>
    @if ($errors->has('observacoes'))
    Mínimo de 1 caracter
    <br><br>
    @endif
    
    
    
    
    <input type="submit" name="enviar">
    
</form>
<h2>Deseja eliminar esta editora</h2>
<h2>{{$editora->nome}}</h2>
<form method="post" action="{{route('editoras.destroy',['ide'=>$editora->id_editora])}}">
@csrf
@method('delete')
    <input type="submit" value="enviar">
</form>
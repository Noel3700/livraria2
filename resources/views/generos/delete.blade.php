<h2>Deseja eliminar este genero</h2>
<h2>{{$genero->designacao}}</h2>
<form method="post" action="{{route('generos.destroy',['idg'=>$genero->id_genero])}}">
@csrf
@method('delete')
    <input type="submit" value="enviar">
</form>
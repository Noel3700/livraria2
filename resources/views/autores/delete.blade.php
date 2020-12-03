<h2>Deseja eliminar o autor</h2>
<h2>{{$autor->nome}}</h2>
<form method="post" action="{{route('autores.destroy',['ida'=>$autor->id_autor])}}">
@csrf
@method('delete')
    <input type="submit" value="enviar">
</form>
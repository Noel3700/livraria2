<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Autor;

class AutoresController extends Controller
{
    //
    public function index(){
        //$autores = Autor::all()->sortbydesc('idl');
        $autores= Autor::paginate(4);
        return view('autores.index',[
            'autores'=>$autores
        ]);
    }
    public function show(Request $request){
        $idAutores = $request->ida;
        //$autores=Autor::findOrFail($idAutores);
        //$autores=Autor::find($idAutores);
        $autores=Autor::where('id_autor',$idAutores)->with('livros')->first();
        return view('autores.show',[
            'autores'=>$autores
        ]);
    }
    
     public function create(){
         if(Gate::allows('admin')){
        return view('autores.create');
    }
     }
    
    public function store(Request $req){
        //$novolivro = $req->all();
        //dd($novolivro);
        $novoAutor = $req->validate([
            'nome'=>['required','min:3','max:100'],
            'nacionalidade'=>['nullable','min:3','max:10'],
            'data_nascimento'=>['nullable','date'],
            'fotografia'=>['nullable'],

        ]);
        $autor=Autor::create($novoAutor);
        
        return redirect()->route('autores.show',[
            'ida'=>$autor->id_autor
        ]);
    }
    
    
     public function edit(Request $req){
        $editAutor=$req->ida;
         if(Gate::allows('admin')){
            $autor = Autor::where('id_autor',$editAutor)->first();
        
        return view('autores.edit',[
            'autor'=>$autor
        ]);
         }
         else{
            return redirect()->route('autores.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
            
    }
     }
    
    
    public function update(Request $req){
        $idAutor=$req->ida;
        $novoAutor = $req->validate([
            'nome'=>['required','min:3','max:100'],
            'nacionalidade'=>['nullable','min:3','max:10'],
            'data_nascimento'=>['nullable','date'],
            'fotografia'=>['nullable'],

        ]);
        
        
        $autor->update($editAutor);
        
        return redirect()->route('autores.show',[
            'ida'=>$autor->id_autor
        ]);
    }
    
    
    public function delete(Request $r){
        $idAutor=$r->ida;
        $autor=Autor::where('id_autor',$idAutor)->first();
        if(is_null($autor)){
            return redirect()->route('autores.index');
        }
        else
        {
            return view('autores.delete',[
                'autor'=>$autor
            ]);
        }
    }
    
    public function destroy(Request $r){
        $idAutor=$r->ida;
        $autor=Autor::where('id_autor',$idAutor)->first();
        if(is_null($autor)){
            return redirect()->route('autores.index');
        }
        else
        {
            $autor->delete();
            return redirect()->route('autores.index')->with('mensagem','Autor eliminado!');
                
            
        }
       
    }
    
    
    
    
    
    
}

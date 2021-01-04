<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Genero;

class GenerosController extends Controller
{
    //
    public function index(){
        //$generos = Genero::all()->sortbydesc('idl');
        $generos= Genero::paginate(4);
        return view('generos.index',[
            'generos'=>$generos
        ]);
    }
    public function show(Request $request){
        $idgenero = $request->idg;
        //$genero=Genero::findOrFail($idgenero);
        //$genero=Genero::find($idgenero);
        $genero=Genero::where('id_genero',$idgenero)->with('livros')->first();
        return view('generos.show',[
            'genero'=>$genero
        ]);
    }
    
    public function create(){
         if(Gate::allows('admin')){
        return view('generos.create');
    }
         else{
            return redirect()->route('generos.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
        }
    }
    
    public function store(Request $req){
        //$novolivro = $req->all();
        //dd($novolivro);
        $novoGenero = $req->validate([
            'designacao'=>['required','min:3','max:100'],
            'observacoes'=>['nullable','min:3','max:10'],
            
        ]);
         if(Gate::allows('admin')){
        $genero=Genero::create($novoGenero);
        
        return redirect()->route('generos.show',[
            'idg'=>$genero->id_genero
        ]);
             
         }
    }
        
    
     public function edit(Request $req){
        $editGenero=$req->idg;
            $genero = Genero::where('id_genero',$editGenero)->first();
        if(Gate::allows('admin')){
            
            
        return view('generos.edit',[
            'genero'=>$genero
        ]);
            
        }
         else{
            return redirect()->route('generos.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
    }
     }
    
    public function update(Request $req){
        $idGenero=$req->idg;
        if(Gate::allows('admin')){
            $genero=Genero::where('id_genero',$idGenero)->first();
            $editGenero = $req->validate([
            'designacao'=>['required','min:3','max:100'],
            'observacoes'=>['nullable','min:3','max:10'],
            
            ]);
            $genero->update($editGenero);
        
            return redirect()->route('generos.show',[
            'idg'=>$genero->id_genero
            ]);
        }
         else{
            return redirect()->route('generos.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
        }
    }
    
    
     public function delete(Request $r){
        $idGenero=$r->idg;
         if(Gate::allows('admin')){
            $genero=Genero::where('id_genero',$idGenero)->first();
             if(is_null($genero)){
                return redirect()->route('generos.index');
            }
            else
            {
                return view('generos.delete',[
                    'genero'=>$genero
                ]);
            }
            }
            else {
                return redirect()->route('generos.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
                }
        
     }
    
    public function destroy(Request $r){
        $idGenero=$r->idg;
        if(Gate::allows('admin')){
        $genero=Genero::where('id_genero',$idGenero)->first();
        if(is_null($genero)){
            return redirect()->route('generos.index');
        }
        else
        {
            $genero->delete();
            return redirect()->route('generos.index')->with('mensagem','Genero eliminado!');
                
            
        }
        }
            else{
            return redirect()->route('generos.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
            }
       
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

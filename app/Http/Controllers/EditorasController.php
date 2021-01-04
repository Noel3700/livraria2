<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Editora;

class EditorasController extends Controller
{
    //
    public function index(){
        //$editoras = Editora::all()->sortbydesc('idl');
        $editoras= Editora::paginate(4);
        return view('editoras.index',[
            'editoras'=>$editoras
        ]);
    }
    public function show(Request $request){
        $idEditora = $request->ide;
        //$editora=Editora::findOrFail($idEditora);
        //$editora=Editora::find($idEditora);
        $editora=Editora::where('id_editora',$idEditora)->with('livros')->first();
        return view('editoras.show',[
            'editora'=>$editora
        ]);
    }
    
     
    public function create(){
         if(Gate::allows('admin')){
        return view('editoras.create');
    }
         else{
            return redirect()->route('editoras.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
         }
    }
    
    public function store(Request $req){
        //$novolivro = $req->all();
        //dd($novolivro);
        $novaEditora = $req->validate([
            'nome'=>['required','min:3','max:100'],
            'morada'=>['nullable','min:3','max:255'],
            'observacoes'=>['nullable','min:1','max:255'],
            
        ]);
        $editora=Editora::create($novaEditora);
        
        return redirect()->route('editoras.show',[
            'ide'=>$editora->id_editora
        ]);
    }
    
     public function edit(Request $req){
        $editEditora=$req->ide;
          if(Gate::allows('admin')){
            $editora = Editora::where('id_editora',$editEditora)->first();
        
        return view('editoras.edit',[
            'editora'=>$editora
        ]);
          }
              else{
            return redirect()->route('editoras.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
              
              }
        }
    
    
    public function update(Request $req){
        $idEditora=$req->ide;
        if(Gate::allows('admin')){
        $editora=Editora::where('id_editora',$idEditora)->first();
        $editEditora = $req->validate([
            'nome'=>['required','min:3','max:100'],
            'morada'=>['nullable','min:3','max:255'],
            'observacoes'=>['nullable','min:1','max:255'],
            
        ]);
        $editora->update($editEditora);
        
        return redirect()->route('editoras.show',[
            'ide'=>$editora->id_editora
        ]);
        }
            else{
            return redirect()->route('editoras.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
            }   
        
    }
    
    
    
    public function delete(Request $r){
        $idEditora=$r->ide;
        if(Gate::allows('admin')){
        $editora=Editora::where('id_editora',$idEditora)->first();
        if(is_null($editora)){
            return redirect()->route('editoras.index');
        }
        else
        {
            return view('editoras.delete',[
                'editora'=>$editora
            ]);
        }
        }
             else{
            return redirect()->route('editoras.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
            }  
        }
    
    
    public function destroy(Request $r){
        $idEditora=$r->ide;
         if(Gate::allows('admin')){
        $editora=Editora::where('id_editora',$idEditora)->first();
        if(is_null($editora)){
            return redirect()->route('editoras.index');
        }
        else
        {
            $editora->delete();
            return redirect()->route('editoras.index')->with('mensagem','Editora eliminada!');
        }
         }
             else{
            return redirect()->route('editoras.index')->with('mensagem','Não tem permissão para aceder à área pretendida.');
       
    }
         
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

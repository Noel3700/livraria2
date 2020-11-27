<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivrosController extends Controller
{
    //
    public function index(){
        //$livros = Livro::all()->sortbydesc('idl');
        $livros= Livro::paginate(4);
        return view('livros.index',[
            'livros'=>$livros
        ]);
    }
    public function show(Request $request){
        $idLivro = $request->id;
        //$livro=Livro::findOrFail($idLivro);
        //$livro=Livro::find($idLivro);
        $livro=Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras'])->first();
        return view('livros.show',[
            'livro'=>$livro
        ]);
    }
    
    public function create(){
        return view('livros.create');
    }
    
    public function store(Request $req){
        //$novolivro = $req->all();
        //dd($novolivro);
        $novoLivro = $req->validate([
            'titulo'=>['required','min:3','max:100'],
            'idioma'=>['nullable','min:3','max:10'],
            'total_paginas'=>['nullable','numeric','min:1'],
            'data_edicao'=>['nullable','date'],
            'isbn'=>['nullable','min:13','max:13'],  
            'observacoes'=>['nullable','min:1','max:255'],
            'imagem_capa'=>['nullable'],
            'id_genero'=>['numeric','nullable'],
            'id_autor'=>['numeric','nullable'],
            'sinopse'=>['nullable','min:3','max:255'],
        ]);
        $livro=Livro::create($novoLivro);
        
        return redirect()->route('livros.show',[
            'id'=>$livro->id_livro
        ]);
    }
    
    public function edit(Request $req){
        $editLivro=$req->id;
            $livro = Livro::where('id_livro',$editLivro)->first();
        
        return view('livros.edit',[
            'livro'=>$livro
        ]);
            
    }
    
    public function update(Request $req){
        $idLivro=$req->id;
        $livro=Livro::where('id_livro',$idLivro)->first();
        $editLivro = $req->validate([
            'titulo'=>['required','min:3','max:100'],
            'idioma'=>['nullable','min:3','max:10'],
            'total_paginas'=>['nullable','numeric','min:1'],
            'data_edicao'=>['nullable','date'],
            'isbn'=>['nullable','min:13','max:13'],  
            'observacoes'=>['nullable','min:1','max:255'],
            'imagem_capa'=>['nullable'],
            'id_genero'=>['numeric','nullable'],
            'id_autor'=>['numeric','nullable'],
            'sinopse'=>['nullable','min:3','max:255'],
        ]);
        $livro->update($editLivro);
        
        return redirect()->route('livros.show',[
            'id'=>$livro->id_livro
        ]);
    }
    
    
    
}

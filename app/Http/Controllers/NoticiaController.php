<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $dados = Noticia::all();
        return view('news/news', compact('dados'));
    }

    public function create()
    {
        return view('news/addnews');
    }

    public function store(Request $request)
    {
        $dados = new Noticia();
        $dados->titulo = $request->input('titulo');
        $dados->corpo = $request->input('corpo');
        $dados->likes = 0;
        $dados->dislikes = 0;
        $dados->autor = $request->input('autor');
        $dados->save();

        return redirect('/news')->with('success', 'Notícia adicionada com sucesso!');
    }

    public function edit(string $id)
    {
        $dados = Noticia::find($id);
        if(isset($dados) && $dados->autor === Auth::user()->name){
            return view('news/editnews', compact('dados'));
        }
        return redirect('news/news')->with('error', 'Você não tem permissão para editar esta notícia.');
    }

    public function update(Request $request, string $id)
    {
        $dados = Noticia::find($id);
        if(isset($dados)){
            $dados->titulo = $request->input('titulo');
            $dados->corpo = $request->input('corpo');
            $dados->save();

            return redirect('/news')->with('success', 'Notícia atualizada com sucesso!');
        }
        return redirect('/news')->with('error', 'Notícia não encontrada.');
    }

    public function destroy(string $id)
    {
        $dados = Noticia::find($id);
        if(isset($dados) && $dados->autor === Auth::user()->name){
            $dados->delete();
            return redirect('/news')->with('success', 'Notícia deletada com sucesso!');
        }
        return redirect('/news')->with('error', 'Você não tem permissão para deletar esta notícia.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        $dados = Noticia::orderBy('id', 'desc')->get(); 

        if ($userId) {
            $userVotes = DB::table('votes')
                            ->where('user_id', $userId)
                            ->pluck('type', 'noticia_id');

            $dados->each(function ($noticia) use ($userVotes) {
                $noticia->user_vote = $userVotes->get($noticia->id, 0); 
            });
        } else {
            $dados->each(function ($noticia) {
                $noticia->user_vote = 0;
            });
        }
    
        return view('news/news', compact('dados'));
    }

    public function create()
    {   
        if(!Auth::check() || !Auth::user()->adm){
            return redirect('/news')->with('error', 'Você não tem permissão para adicionar notícias.');
        }
        return view('news/addnews');
    }

    public function store(Request $request)
    {
        if(!Auth::check() || !Auth::user()->adm){
            return redirect('/news')->with('error', 'Você não tem permissão para adicionar notícias.');
        }
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
        return redirect('/news')->with('error', 'Você não tem permissão para editar esta notícia.');
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

    public function vote(Request $request, string $id)
    {
        $type = $request->input('type');

        if (!in_array($type, [1, -1])) {
            return response()->json(['message' => 'Tipo de voto inválido.'], 400);
        }
        
        if (!Auth::check()) {
            return response()->json(['message' => 'Usuário não autenticado.'], 401);
        }
        
        $noticia = Noticia::find($id);
        if (is_null($noticia)) {
            return response()->json(['message' => 'Notícia não encontrada.'], 404);
        }

        $userId = Auth::id();
        $voteData = [
            'noticia_id' => $id,
            'user_id' => $userId,
        ];

        $existingVote = DB::table('votes')->where($voteData)->first();
        $oldVoteType = $existingVote ? $existingVote->type : 0;
        
        if ($oldVoteType == $type) {
            $noticia->decrement($type === 1 ? 'likes' : 'dislikes');

            DB::table('votes')->where($voteData)->delete();
            $message = "Voto removido com sucesso.";
            $type = 0;
        } 
        else {
            DB::transaction(function () use ($noticia, $voteData, $type, $oldVoteType) {

                if ($oldVoteType !== 0) {
                    $noticia->increment($oldVoteType === 1 ? 'likes' : 'dislikes', -1);
                }

                $noticia->increment($type === 1 ? 'likes' : 'dislikes');
                
                DB::table('votes')->updateOrInsert(
                    $voteData,
                    ['type' => $type]
                );
            });
            $message = "Voto registrado com sucesso.";
        }

        $noticia->refresh(); 
        return response()->json([
            'message' => $message,
            'likes' => $noticia->likes,
            'dislikes' => $noticia->dislikes,
            'voted' => $type 
        ]);
    }
}

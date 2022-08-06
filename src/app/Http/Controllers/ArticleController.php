<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Radio;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Whoops\Run;
use function Symfony\Component\String\s;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        $articles = Article::latest('created_at')
            ->with('user', 'radio')
            ->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function create(Article $article)
    {
        $radios = Radio::all();
        return view('articles.create', compact('article'))
            ->with(['radios' => $radios]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->radio_id = $request->radio_id;
        $article->radio_date = $request->radio_date;
        $article->body = $request->body;
        $article->link = $request->link;
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $radios = Radio::all();
        return view('articles.edit', compact('article'))
            ->with(['radios' => $radios]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function search_radio(Request $request)
    {
        $searchquery = $request->input('query');
        $data = Radio::where('radio_title', 'like', '%' . $searchquery . '%')->limit(10)->get();
        return response()->json($data);
    }
}

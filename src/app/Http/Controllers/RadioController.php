<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RadioRequest;
use App\Models\Article;
use App\Models\Radio;
use Carbon\Carbon;
use PhpParser\Node\Arg;
use illuminate\support\Facades\Auth;

class RadioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radios = Radio::all()->sortByDesc('created_at');
        return view('radios.list', compact('radios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radios.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RadioRequest $request, Radio $radio)
    {
        $radio->radio_title = $request->radio_title;
        $radio->radio_date = $request->radio_date;
        $radio->start_time = $request->start_time;
        $radio->end_time = $request->end_time;
        $radio->broadcaster = $request->broadcaster;
        $radio->radio_about = $request->radio_about;
        $radio->save();
        return redirect()->route('radios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Radio $radio)
    {
        $articles = Article::where('radio_id', '=', $radio->id)->get()->sortByDesc('created_at');
        return view('radios.about', compact('radio', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Radio $radio)
    {
        return view('radios.edit', compact('radio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Radio $radio)
    {
        $radio->fill($request->all())->save();
        return redirect()->route('radios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radio $radio)
    {
        $radio->delete();
        return redirect()->route('radios.index');
    }

    public function favorite(Request $request, Radio $radio)
    {
        $radio->favorites()->detach($request->user()->id);
        $radio->favorites()->attach($request->user()->id);

        return [
            'id' => $radio->id,
            'countFavorites' => $radio->count_favorites,
        ];
    }

    public function unfavorite(Request $request, Radio $radio)
    {
        $radio->favorites()->detach($request->user()->id);

        return [
            'id' => $radio->id,
            'countFavorites' => $radio->count_favorites,
        ];
    }
}

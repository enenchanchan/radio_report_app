<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RadioRequest;
use App\Models\Article;
use App\Models\Radio;
use PhpParser\Node\Arg;
use illuminate\support\Facades\Auth;
use InterventionImage;
use Illuminate\Support\Facades\Storage;

class RadioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function __construct()
    {
        $this->authorizeResource(Radio::class, 'radio');
    }

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
    public function create(Radio $radio)
    {
        return view('radios.create', compact('radio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RadioRequest $request, Radio $radio)
    {

        $image = $request->file('image');

        if ($image !== null) {
            $filename = $image->getClientOriginalName();
            InterVentionImage::make($image)->resize(
                400,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save(storage_path('app/public/' . $filename));
            $radio->radio_title = $request->radio_title;
            $radio->radio_date = $request->radio_date;
            $radio->start_time = $request->start_time;
            $radio->end_time = $request->end_time;
            $radio->broadcaster = $request->broadcaster;
            $radio->radio_about = $request->radio_about;
            $radio->image = $filename;
            $radio->save();
        } else {
            $radio->fill($request->all())->save();
        }


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
        $articles = Article::latest('created_at')
            ->with('user', 'radio')
            ->where('radio_id', '=', $radio->id)
            ->paginate(10);
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
    public function update(RadioRequest $request, Radio $radio)
    {
        $image = $request->file('image');
        if ($image !== null) {
            $filename = $image->getClientOriginalName();
            if ($radio->image !== null) {
                Storage::disk('public')->delete(($radio->image));
            }
            InterVentionImage::make($image)->resize(
                400,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save(storage_path('app/public/' . $filename));
            $radio->update([
                'radio_title' => $request->radio_title,
                'radio_date' => $request->radio_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'broadcaster' => $request->broadcaster,
                'radio_about' => $request->radio_about,
                'image' => $filename,
            ]);
        } else {
            $radio->fill($request->all())->save();
        };
        return redirect()->route('radios.show', compact('radio'));
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

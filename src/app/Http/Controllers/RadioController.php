<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RadioRequest;
use App\Models\Radio;
use Carbon\Carbon;

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
        return view('radios.about', ['radio' => $radio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
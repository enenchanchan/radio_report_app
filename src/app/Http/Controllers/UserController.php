<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\MstPrefecture;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\AggregateException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $articles = $user->articles()->latest('created_at')->paginate(10);

        $date  = Carbon::parse($user->age);
        $birthday = $date->age;

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
            'birthday' => $birthday,
        ]);
    }

    public function favorites(string $id)
    {
        $user = User::where('id', $id)->first();
        $radios = $user->favorites()->latest('created_at')->paginate(5);

        $date  = Carbon::parse($user->age);
        $birthday = $date->age;

        return view('users.favorites', [
            'user' => $user,
            'radios' => $radios,
            'birthday' => $birthday
        ]);
    }

    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        $this->authorize('update', $user);
        $prefectures = MstPrefecture::all();
        return view(
            'users.edit',
            [
                'user' => $user,
                'prefectures' => $prefectures
            ]
        );
    }

    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all())->save();
        return redirect()->route('users.show', ['user' => $user->id]);
    }
}

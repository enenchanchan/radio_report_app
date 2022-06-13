<?php

namespace App\Http\Controllers;

use App\Models\MstPrefecture;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\AggregateException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name,)
    {
        $user = User::where('name', $name)->first();

        $articles = $user->articles->sortByDesc('created_at');

        $date  = Carbon::parse($user->age);
        $birthday = $date->age;

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
            'birthday' => $birthday,
        ]);
    }

    public function favorites(string $name)
    {
        $user = User::where('name', $name)->first();

        $articles = $user->favorites->sortByDesc('created_at');

        return view('users.favorites', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Article;
use App\Models\MstPrefecture;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\AggregateException;
use Illuminate\Http\Request;
use InterventionImage;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $articles = Article::where('user_id', $id)
            ->with('user', 'radio')
            ->latest('updated_at')
            ->paginate(5);
        $date  = Carbon::parse($user->age);
        $birthday = $date->age;

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
            'birthday' => $birthday,
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
        $image = $request->file('image');
        if ($image !== null) {
            $filename = $image->getClientOriginalName();
            if ($user->image !== null) {
                Storage::disk('public')->delete(($user->image));
            }
            InterVentionImage::make($image)->resize(
                64,
                64,
            )->save(storage_path('app/public/' . $filename));
            $user->update([
                'name' => $request->name,
                'age' => $request->age,
                'prefecture_id' => $request->prefecture_id,
                'image' => $filename,
            ]);
        } else {
            $user->fill($request->all())->save();
        };
        return redirect()->route('users.show', ['user' => $user->id]);
    }


    public function favorites(string $id)
    {
        $user = User::find($id);
        $radios = $user->favorites()
            ->orderBy('pivot_created_at', 'desc')
            ->paginate(5);
        $date  = Carbon::parse($user->age);
        $birthday = $date->age;

        return view('users.favorites', [
            'user' => $user,
            'radios' => $radios,
            'birthday' => $birthday
        ]);
    }
}

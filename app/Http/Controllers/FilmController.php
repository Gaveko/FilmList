<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();

        return view('films.index', ['films' => $films]);
    }

    public function createForm()
    {
        return view('films.create');
    }

    public function create(Request $request)
    {
        $film = new Film;

        $film->title = $request->title;
        $film->description = $request->description;
        $film->rating = 5;
        
        $film->save();

        return redirect(route('film-index'));
    }

    public function details(int $id)
    {
        $film = Film::findOrFail($id);

        return view('films.details', ['film' => $film]);
    }
}

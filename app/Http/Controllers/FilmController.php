<?php

namespace App\Http\Controllers;

use App\Events\FilmRated;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        
        return view('films.index', ['films' => $films]);
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'unique:films', 'max:255'],
            'description' => ['required'],
            'poster' => ['required', 'image']
        ]);

        $film = new Film;
        
        $film->title = $request->title;
        $film->description = $request->description;
        $film->rating = 5;
        $film->poster_path = $request->file('poster')->store('posters', 'public');

        $film->save();

        return redirect(route('film.index'));
    }

    public function details(Request $request, Film $film)
    {
        $canEvaluate = true;
        $evaluate = null;

        if ($request->user()) {
            if ($film->ratings()->where('user_id', $request->user()->id)->exists()) {
                $canEvaluate = false;
                $evaluate = $film->ratings()->where('user_id', $request->user()->id)->first()->rating;
            }
        }
        

        return view('films.details', ['film' => $film, 'canEvaluate' => $canEvaluate, 'evaluate' => $evaluate]);
    }

    public function sendReview(Request $request)
    {
        $film = Film::find($request->film_id);

        $review = new Review;
        $review->body = $request->body;
        $review->user()->associate($request->user());
        $review->film()->associate($film);
        $review->save();

        return back();
    }

    public function evaluate(Request $request)
    {
        $film = Film::find($request->film_id);

        $rating = new Rating;
        $rating->rating = $request->rating;
        $rating->user()->associate($request->user());
        $rating->film()->associate($film);
        $rating->save();

        FilmRated::dispatch($film);

        return back();
    }
}

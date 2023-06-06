<?php

namespace App\Listeners;

use App\Events\FilmRated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateFilmRating
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FilmRated $event): void
    {
        $event->film->rating = $event->film->ratings()->avg('rating');
        $event->film->save();
    }
}

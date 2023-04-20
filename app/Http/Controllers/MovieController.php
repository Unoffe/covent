<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Request $request): View
    {
        $movies = Movie::query()->with('genre')
            ->search($request->get('search'))
            ->genre($request->get('genre'))
            ->year(
                $request->get('year'),
                $request->get('year_from'),
                $request->get('year_to')
            )
            ->active()
            ->orderBy('year', 'DESC')
            ->orderBy('title', 'ASC')
            ->paginate(10)
            ->appends($request->query());

        $genres = Genre::query()->get()->pluck('title', 'id');

        return view('movies')->with([
            'movies' => $movies,
            'genres' => $genres,
            'filters' => $request->input(),
        ]);
    }
}

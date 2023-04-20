<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $movies = Movie::query()->with('genre')
            ->search($request->get('search'))
            ->genre($request->get('genre'))
            ->year(
                $request->get('year'),
                $request->get('year_from'),
                $request->get('year_to')
            )
            ->orderBy('id', 'DESC')
            ->orderBy('title', 'ASC')
            ->paginate(10)
            ->appends($request->query());

        $genres = Genre::query()->get()->pluck('title', 'id');

        return view('admin.movies')->with([
            'movies' => $movies,
            'genres' => $genres,
            'filters' => $request->input(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $genres = Genre::query()->get()->pluck('title', 'id');

        return view('admin.movie-edit')->with([
            'movie' => null,
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request): RedirectResponse
    {
        Movie::query()->create($request->validated());

        return redirect()->route('movies.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie): View
    {
        $genres = Genre::query()->get()->pluck('title', 'id');

        return view('admin.movie-edit')->with([
            'movie' => $movie,
            'genres' => $genres
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie): RedirectResponse
    {
        $validatedData = $request->validated();

        $movie->title = $validatedData['title'];
        $movie->description = $validatedData['description'];
        $movie->year = $validatedData['year'];
        $movie->genre_id = $validatedData['genre_id'];
        $movie->update();

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();

        return back();
    }

    public function togglePublish(Movie $movie): RedirectResponse
    {
        $movie->active = !$movie->active;
        $movie->update();

        return back();
    }
}

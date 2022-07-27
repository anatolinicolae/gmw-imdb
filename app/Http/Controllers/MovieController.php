<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $movies = Movie::all();

        return response(view('movies.index', [
            'movies' => $movies,
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreMovieRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateMovieRequest $request
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie): \Illuminate\Http\Response
    {
        //
    }
}

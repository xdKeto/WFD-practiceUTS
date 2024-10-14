<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movieData = Movie::query()->get();

        
        return view('movies/index', compact('movieData'));
    }

    public function show($id){
        // Retrieve the movie by ID and load its tickets
        $movie = Movie::with('tickets')->findOrFail($id);
    
        // Get the tickets associated with the movie
        $tickets = $movie->tickets;
    
        // Return the movie and its tickets to the view
        return view('movies/view', compact('movie', 'tickets'));
    }
    

    public function create($id){
        
        $movieData = Movie::findOrFail($id);

        return view('movies/book', compact('movieData'));
    }
}
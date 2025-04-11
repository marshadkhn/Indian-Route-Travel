<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FindStaysController extends Controller
{
    /**
     * Display the find stays page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.findStays');
    }
    
    /**
     * Search for stays based on criteria
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // In the future, this will handle the search functionality
        // For now, just return to the index with a message
        return redirect()->route('findStays')->with('message', 'Search functionality coming soon!');
    }
}

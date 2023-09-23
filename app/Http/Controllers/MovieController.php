<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // FILTER BY INPUT SEARCH        
        $keyword = $request->get('search', '');
        $query = Movie::where(function ($q) use ($keyword) {
            $q->where('title', 'LIKE', "%$keyword%")
                ->orWhere('actor', 'LIKE', "%$keyword%");
        });
        
        // FILTER BY PRICE        
        $priceMin = $request->get('priceMin',0);
        $priceMax = $request->get('priceMax',10000);
        $query = $query->whereBetween('price', [$priceMin, $priceMax]);

        // FILTER BY CATEGORIES 
        $category_ids = $request->get('category_ids', []);
        if(!empty($category_ids)){
            $query = $query->whereIn('category_id', $category_ids);
        }

        // ORDER BY : default with best-seller
        $sort = $request->get('sort', 'best-seller');
        switch ($sort) {
            case "best-seller": $query = $query->orderBy('sold', 'desc'); break;
            case "price-asc": $query = $query->orderBy('price', 'asc'); break;
            case "price-desc": $query = $query->orderBy('price', 'desc'); break;
        }

        // PAGINATION
        $perPage = 25;
        $movie = $query->paginate($perPage);

        // Category
        $category = Category::get();        

        return view('movie.index', compact('movie','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Movie::create($requestData);

        return redirect('movie')->with('flash_message', 'Movie added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movie.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $movie = Movie::findOrFail($id);
        $movie->update($requestData);

        return redirect('movie')->with('flash_message', 'Movie updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Movie::destroy($id);

        return redirect('movie')->with('flash_message', 'Movie deleted!');
    }
}
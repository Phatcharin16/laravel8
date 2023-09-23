<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class MovieLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $keyword = "";
    public $priceMin = 0;
    public $priceMax = 10000;
    public $category_ids = [];
    public $sort = "best-seller";
    public $perPage = 25;
    public function render()
    {
        // FILTER BY INPUT SEARCH        
        // $keyword = $request->get('search', '');
        $keyword = $this->keyword;
        $query = Movie::where(function ($q) use ($keyword) {
            $q->where('title', 'LIKE', "%$keyword%")->orWhere('actor', 'LIKE', "%$keyword%");
        });
        // FILTER BY PRICE        
        // $priceMin = $request->get('priceMin',0);
        // $priceMax = $request->get('priceMax',10000);        
        $priceMin = $this->priceMin;
        $priceMax = $this->priceMax;
        $query = $query->whereBetween('price', [$priceMin, $priceMax]);
        // FILTER BY CATEGORIES
        // $category_ids = $request->get('category_id', []);
        $category_ids = $this->category_ids;
        if (!empty($category_ids)) {
            $query = $query->whereIn('category_id', $category_ids);
        }
        // ORDER BY : default with best-seller
        // $sort = $request->get('sort', 'best-seller');
        $sort = $this->sort;
        switch ($sort) {
            case "best-seller":
                $query = $query->orderBy('sold', 'desc');
                break;
            case "price-asc":
                $query = $query->orderBy('price', 'asc');
                break;
            case "price-desc":
                $query = $query->orderBy('price', 'desc');
                break;
        }
        // PAGINATION
        // $perPage = 25;
        $movie = $query->paginate($this->perPage);
        // Category
        $category = Category::get();
        return view('livewire.movie-livewire', compact('movie', 'category'));
    }
}

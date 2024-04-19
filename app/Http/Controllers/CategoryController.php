<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Ebook;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('category.add-category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name'=>$request->name,
        ]);
        toastr()->success('Category created successfully.');

        return to_route( 'category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.category',[
            'category' => $category,
            'books' => Book::where('category_id',$category->id)->get(),
            'ebooks' => Ebook::withWhereHas('book', fn($query) =>
            $query->where('category_id', $category->id)
           )->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        toastr()->success('Category edited successfully.');

        return to_route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        toastr()->warning('Category deleted successfully.');

        return to_route('category.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function rankItems()
    {
        $items = Item::with(['category', 'genre', 'createdBy', 'userReviews'])
            ->where('isApproved', true)
            ->get();
        return view('rank-items', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select(['id as value', 'name as label'])->get()->toArray();
        $genres = Genre::select(['id as value', 'name as label'])->get()->toArray();

        return view('create', compact('categories', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Item::create([
            'title' => $request->input('title'),
            'isApproved' => false,
            'user_id' => Auth::id(),
            'category_id' => $request->input('category'),
            'genre_id' => $request->input('genre'),
        ]);
        return redirect(route('item.store.success'));
    }

    public function storeSuccess()
    {
        return view('storeSuccess');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
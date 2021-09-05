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
    public function rankItems(Request $request)
    {
        $items = Item::with(['category', 'genre', 'createdBy', 'userReviews'])
            ->where('isApproved', true);

        $categoryId = $request->query('category');
        if ($categoryId) {
            $items->where('category_id', $categoryId);
        }
        $items = $items->get();

        $currentUserId = Auth::id();
        $categories = Category::select(['id as value', 'name as label'])->get()->toArray();

        return view('rank-items', compact('items', 'currentUserId', 'categories'));
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
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'exists:App\Models\Category,id'],
            'genre' => ['required', 'exists:App\Models\Genre,id'],
        ]);

        $currentUser = Auth::user();
        Item::create([
            'title' => $request->input('title'),
            'isApproved' => $currentUser->isAdmin,
            'user_id' => $currentUser->id,
            'category_id' => $request->input('category'),
            'genre_id' => $request->input('genre'),
        ]);
        if ($currentUser->isAdmin) {
            return redirect(route('rank-items'));
        }
        return redirect(route('item.store.success'));
    }

    public function storeSuccess()
    {
        return view('store-success');
    }

    public function reviewCreate($id)
    {
        $item = Item::findOrFail($id);
        return view('add-review', compact('item'));
    }

    public function reviewStore(Request $request)
    {
        $request->validate([
            'rank' => ['required', 'integer', 'min:1', 'max:10'],
            'comment' => ['required'],
        ]);

        $item = Item::findOrFail($request->input('item_id'));
        $item->userReviews()->attach(
            Auth::id(),
            [
                'rank' => $request->input('rank'),
                'comment' => $request->input('comment'),
            ]
        );
        return redirect(route('item.store.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Item::with(['category', 'genre', 'createdBy', 'userReviews'])->findOrFail($id);
        $currentUserId = Auth::id();
        return view('show', compact('item', 'currentUserId'));
    }

    public function createApprove()
    {
        $items = Item::with(['category', 'genre', 'createdBy', 'userReviews'])
            ->where('isApproved', false)
            ->get();
        $currentUserId = Auth::id();
        return view('create-approve', compact('items', 'currentUserId'));
    }

    public function createApproveStore(Request $request)
    {
        $item = Item::findOrFail($request->input('item_id'));
        $item->isApproved = true;
        $item->save();
        return redirect(route('item.create.approve'));
    }

    public function createRejectStore(Request $request)
    {
        $item = Item::findOrFail($request->input('item_id'));
        $item->delete();
        return redirect(route('item.create.approve'));
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

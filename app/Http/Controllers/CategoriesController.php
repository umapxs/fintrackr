<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{

    /**
     * Index
     *
     */
    public function index() {
        $userId = Auth::id();
        $categories = Categories::where('user_id', $userId)->latest()->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Create
     *
     */
    public function create(Request $request) {
        $request->validate([
            'category_name' => 'required|string|max:50',
        ]);

        // Create a new category instance
        $category = new Categories();

        $category->title = $request->input('category_name');
        $category->user_id = Auth::id();

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Destroy
     *
     */
    public function destroy(Categories $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}


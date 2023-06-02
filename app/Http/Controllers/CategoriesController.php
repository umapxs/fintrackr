<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{

    /**
     * Index
     *
     */
    public function index() {
        $account = auth()->user()->account;

        $categories = $account->categories()->latest()->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Create
     *
     */
    public function create(Request $request) {
        $request->validade([
            'category_name' => 'required|string|max:50',
        ]);

        // Create a new category instance
        $category = new Categories();

        $category->title = $request->input('title');

        $category->save();

        // Retrieve the updated list of categories
        $categories = Categories::latest()->get();

        return view('categories.index', compact('categories'))->with('success', 'Category created successfully!');
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

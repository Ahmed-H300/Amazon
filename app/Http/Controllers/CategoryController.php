<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'delete','edit']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = category::all();
        return view('all_categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name" => 'required|min:5',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        // dd($data);
        category::create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $category = category::findOrFail($id);
        return view('show_category', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $category = category::findOrFail($id);
        #apply gate
        if (! Gate::allows('edit-category', $category)) {
            abort(403);
        }
        return view('edit_category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
        $request->validate([
            "name" => 'required|min:5',
        ]);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $category = category::findOrFail($id);
        if (! Gate::allows('delete-category', $category)) {
            abort(403);
        }
        $category->delete();
        return redirect()->route("categories.index");
    }
}

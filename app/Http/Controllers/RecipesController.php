<?php
// https://github.com/amaelftah/laravel-trix
namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Image;

class RecipesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::select('image', 'name', 'slug')->get();
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the page for browsing all the vendors
     *
     * @return \Illuminate\Http\Response
     */

    public function browse()
    {
        $recipes = Recipe::all();

        return view('recipes.browse', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe;

        $recipe->name = request('recipe_name');

        $file = $request->file('image');
        if($file != null)
        {
            $file_extension = $file->getClientOriginalName();
            $file_path = pathinfo($file_extension, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $file_name = $file_path . '.' . $extension;
            Image::make($file->getRealPath())->resize(348, 200)->save('images/recipes/' . $file_name);
            $recipe->image = $file_name;
        } else
        {
            $recipe->image = 'recipe_default.jpg';
        }

        $recipe->content = request('recipe-trixFields')['content'];
        $recipe->slug = request('slug');

        $recipe->save();

        return back()->with('status', 'Recipe created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $this->validate($request, [
            'recipe_name' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png'
        ]);

        if($request->file('image') != null)
        {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalName();
            $file_path = pathinfo($file_extension, PATHINFO_FILENAME);

            $extension = $file->getClientOriginalExtension();
            $file_name = $file_path . '.' . $extension;

            Image::make($file->getRealPath())->resize(348, 200)->save('images/recipe/' . $file_name);
            $recipe->image = $file_name;
        }

        $recipe->name = request('recipe_name');
        $recipe->content = request('recipe-trixFields')['content'];
        $recipe->save();

        return back()->with('status', 'Recipe updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect('recipes/browse')->with('status', 'Recipe deleted!');
    }
}

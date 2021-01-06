<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/* List of functions in this Controller:
 *
 *	index()
 *	create()
 *	store(Request request)
 *	show($id)					NOT IMPLEMENTED
 *	edit($id)
 *	update(Request $request, $id)
 *	destroy($id)
 */

class RecipeController extends Controller
{

    /** Display a listing of the resource. */
    public function index()
    {
		// We execute a join and pass the recipes table and 
		// the result of the join to our view in order to be able
		// to handle the data in our view.
		$items = DB::table('recipes')
			->join('ingredients', 'recipes.recipe_id', '=', 'ingredients.recipe')
			->select('recipe_name', 'execution', 'notes', 'ingredient_name', 'qty', 'recipe')
			->get();
		$recipes = Recipe::all();
		return view('recipes.index', ['items' => $items, 'recipes' => $recipes]);
    }


    /** Show the form for creating a new resource. */
    public function create()
    {
        return view('recipes.create');
    }


    /** Store a newly created resource in storage. */
    public function store(Request $request)
    {	
		// Save the recipe, without ingredients.
		// We do this first as we need it's id for the ingredient table.
        $request->validate([
			'recipe_name'	=> 'required', 
			'execution'		=> 'required', 
			'notes'			=> 'required'
		]);
        $recipe = new Recipe([
			'recipe_name'	=> $request->get('recipe_name'), 
			'execution'		=> $request->get('execution'), 
			'notes'			=> $request->get('notes')
        ]);
		$recipe->save();
		
		
		// Next we save the ingredients of the recipe.
		// For every ingredient of the request, we
		// create a new ingredient entry in our table, 
		// save it's name and qty based on request, 
		// and associate it's foreign recipe_id key with the recipe's 
		// id that we just saved earlier.
		$counter = 0;
		while($request->has('recipeIngredients'.strval($counter))  &&
			  $request->has('recipeIngredientQty'.strval($counter)))	{
			
			$request->validate([
				'recipeIngredients'.strval($counter) => 'required', 
				'recipeIngredientQty'.strval($counter) => 'required|regex:/^\d+(\.\d{1,2})?$/'
			]);
			
			$ingredient = new Ingredient([
				'ingredient_name' => $request->get('recipeIngredients'.strval($counter)), 
				'qty' => $request->get('recipeIngredientQty'.strval($counter)), 
				'recipe' => $recipe->recipe_id
			]);
			
			$ingredient->save();
			$counter++;
		}

        return redirect('/recipes')->with('success', 'recipe saved!');
    }


    /** Display the specified resource. */
    public function show($id)
    {
        //
    }


    /** Show the form for editing the specified resource. */
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.edit', compact('recipe'));
    }


    /** Update the specified resource in storage. */
    public function update(Request $request, $id)
    {
		// validate the fields required for the recipe.
        $request->validate([
			'recipe_name'	=> 'required', 
			'execution'		=> 'required', 
			'notes'			=> 'required'
		]);
		// What follows is an alternate implementation of how
		// to update a recipe and it's ingredients.
		// First of all, we could update the recipe with 
		// something like this:
		//
		// DB::table('recipes')
		// 		->where('recipe_id', $recipe->recipe_id)
		//		->update([
		//			'recipe_name' => $request->get('recipe_name'),
		//			'execution'   => $request->get('execution'),
		//		]);
		//
		// Should probably improve the following like this:
		// Somehow, we should filter and get only the fields that 
		// the user changed, and then update only them. Javascript maybe?
		// What we do is: 
		// We delete all ingredients, and then get the new ones. 

		// get the recipe that we are updating, 
		// update it's values and save it.
		$recipe = Recipe::find($id);
		$recipe->recipe_name = $request->get('recipe_name');
		$recipe->execution	 = $request->get('execution');
		$recipe->notes		 = $request->get('notes');
		
		$recipe->save();
		
		// Delete all the ingredients the old recipe had.
		$ingredients = DB::table('ingredients')->where('recipe', '=', $id)->get();
		foreach ($ingredients as $ingredient)	{
			$ingredient = Ingredient::find($ingredient->ingredient_id);
			$ingredient->delete();
		}

		// Insert the new ingredients of the recipe (as in store())
		// counter is used to get the name of the input field. 
		// We use javascript in our corrensponding view, and also use
		// counter there, so if you want to understand this better
		// you should check the view file.
		$counter = 0;
		while($request->has('recipeIngredients'.strval($counter))  &&
			  $request->has('recipeIngredientQty'.strval($counter)))	{
			
			$request->validate([
				'recipeIngredients'.strval($counter) => 'required', 
				'recipeIngredientQty'.strval($counter) => 'required|regex:/^\d+(\.\d{1,2})?$/'
			]);
			
			$ingredient = new Ingredient([
				'ingredient_name' => $request->get('recipeIngredients'.strval($counter)), 
				'qty' => $request->get('recipeIngredientQty'.strval($counter)), 
				'recipe' => $recipe->recipe_id
			]);
			
			$ingredient->save();
			$counter++;
		}

        return redirect('/recipes')->with('success', 'recipe updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
		// deletes the recipe. 
		// In our migration file, we declare the 'recipe' foreign key
		// of the table ingredients in a way that when a recipe is removed, 
		// all it's ingredients will be removed too. (onDelete('CASCADE'))
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect('/recipes')->with('success', 'recipe deleted!');
	}
}

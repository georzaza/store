<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
 * IMPORTANT: 
 * This Controller also handles the Ingredients!
 * 
*/


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


/*
 * An important note about validation (store & update methods):
 * 
 * Laravel does not provide a 'double' type for validation.
 * However, we want the 'qty' field of an Ingredient to be a double.
 * So to provide this functionality, we use a regex.
 * (This happens in the validation arrays of the store and update methods)
 * 
 * TODO: this regex is not complete. It accepts double values that 
 * 		 have more than one '.' if these extra dots are at the end of 
 * 		 the string.
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
		// This is half of the validation process and refers to the Recipe entity.
		// We first validate the recipe and save it, because for the ingredients
		// we need this recipe's id .
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
		
		
		// The other half of the validation, the ingredients' validation, 
		// happens here and after that we save the ingredients.
		// In order to understand what this code does, you need to take a look 
		// at the Javascript code in one of the view files: 
		//   resources/views/recipes/create.blade.php
		//   resources/views/recipes/edit.blade.php
		// There, we assign dynamic names for the input fields of the ingredients.
		// (recipeIngredients and recipeIngredientQty)

		$counter = 0; 	// used to produce the same dynamic names as the frontend does
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
		//
		// DB::table('recipes')
		// 		->where('recipe_id', '=', $id)
		//		->update([
		//			'recipe_name' => $request->get('recipe_name'),
		//			'execution'   => $request->get('execution'),
		//			'notes'		  => $request->get('notes')
		//		]);
		//

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

		// Insert the new ingredients of the recipe. 
		// Check the comment section of the store() method 
		// for a better understanding.
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

    /** Remove the specified resource from storage. */
    public function destroy($id)
    {
		// deletes the recipe. 
		// When a recipe is removed, all it's ingredients will 
		// be removed too. This functionality is provided through
		// the use of the: onDelete('CASCADE') option on the 
		// foreign key of the ingredients.
		// (Check the migration file of the Ingredients table)
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect('/recipes')->with('success', 'recipe deleted!');
	}
}

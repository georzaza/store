@extends('base')

@section('main')
<div class="row">
  	<div class="col-sm-8 offset-sm-2">
    	<h1 class="display-3" style="text-align:center;">Update a recipe</h1>
  		<div>
    		@if ($errors->any())
	      		<div class="alert alert-danger">
        			<ul>
		            	@foreach ($errors->all() as $error)
              				<li>{{ $error }}</li>
            			@endforeach
        			</ul>
				</div>
				<br/>
    		@endif

			<form id=theForm method="post" action="{{ route('recipes.update', $recipe->recipe_id) }}">
				@method('PATCH')
				@csrf

        		<div class="form-group" style="text-align:center;">
		            <label for="recipe_name">Recipe Name:<br>(e.g. Spaghetti Marinara)</label><br>
            		<input type="text" class="form-control" name="recipe_name"z>
				</div>
				<br>
        		<div class="form-group" style="text-align:center;">
		            <label for="execution">Execution Instructions:</label><br>
            		<textarea  form="theForm" class="form-control" name="execution" style="width: 400px; height:150px;" >
					</textarea>
				</div>
				<br>
				<div id="formIngredients" class="form-group" style="text-align:center;">
				  	<label for="recipeIngredients0" style="width:250px;  text-align:center;">Ingredient:</label>
					<input type="text" class="form-control" name="recipeIngredients0" style="width:250px;">
					<label for="recipeIngredientQty0" style="width:100px; text-align:center;">  Qty:</label>
        			<input type="number" step="0.001" min=0 class="form-control" name="recipeIngredientQty0" style="width:100px;">
				</div>

				<button type="button" class="btn btn-info"  onclick="doOnClick()" style="margin-left:48%; margin-right:50%; margin-top:7px;">+</button>
				<br>

          		<button type="submit" class="btn btn-primary-outline" style="margin-left:46.5%; margin-right:50%; margin-top:15px;">
					Update recipe
				</button>

				<!-- extends the content of the Ingredients/Qty div (last div above).
					 The labels' and inputs' names are changed accordingly -->
				<script>
					let counter = 1; // used for naming
  					function doOnClick() {
    					let ingredientFormdiv = document.getElementById("formIngredients");
						let ingredient_input_name = "recipeIngredients".concat(counter.toString());
						ingredient_qty_name = "recipeIngredientQty".concat(counter.toString());
    					ingredientFormdiv.innerHTML += '<br>';
						ingredientFormdiv.innerHTML += '<label for="'.concat(ingredient_input_name).concat('" style="width:250px;  text-align:center;">Ingredient: </label>');
						ingredientFormdiv.innerHTML += '<input type="text" class="form-control" name="'.concat(ingredient_input_name).concat('" style="width:250px;">');
						ingredientFormdiv.innerHTML += '<label for="'.concat(ingredient_qty_name).concat('" style="width:100px;  text-align:center;">  Qty: </label>');
						ingredientFormdiv.innerHTML += '<input type="number" step="0.001" min=0 class="form-control" name="'.concat(ingredient_qty_name).concat('" style="width:100px;">');
						counter++;
  					}
  				</script>
      		</form>
  		</div>
	</div>
</div>



@endsection

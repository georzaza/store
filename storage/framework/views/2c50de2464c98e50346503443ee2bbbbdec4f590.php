<?php $__env->startSection('main'); ?>


<div class="topnav">
  <div >
  	<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
	  <a style="margin: 5px;" href="/products" class="btn btn-info">Products</a>
  	<a style="margin: 5px;" href="/recipes" class="btn btn-info active">Recipes</a>
  </div>   
</div>


<div class="row">
  	<div class="col-sm-4 col-md-offset-2">
    	
		<h1 class="display-3" style="text-align:center;">Update a recipe</h1>
    	
		<?php if($errors->any()): ?>
	      	<div class="alert alert-danger">
        		<ul>
		           	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            			<li><?php echo e($error); ?></li>
            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		</ul>
			</div>
			<br/>
    	<?php endif; ?>

		<form id=theForm method="post" action="<?php echo e(route('recipes.update', $recipe->recipe_id)); ?>">
			<?php echo method_field('PATCH'); ?>
			<?php echo csrf_field(); ?>

        	<div class="form-group" style="text-align:center;">
	            <label for="recipe_name">Recipe Name:<br>(e.g. Spaghetti Marinara)</label><br>
        		<input type="text" class="form-control" name="recipe_name" value="<?php echo e($recipe->recipe_name); ?>">
			</div>
			<br>
       		<div class="form-group" style="text-align:center;">
	            <label for="execution">Execution Instructions:</label><br>
           		<textarea  form="theForm" class="form-control" name="execution" style="width: 400px; height:150px;" value="<?php echo e($recipe->execution); ?>" >
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
      	</form>
  	</div>
</div>



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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/recipes/edit.blade.php ENDPATH**/ ?>
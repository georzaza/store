<?php $__env->startSection('main'); ?>
<div class="row">
  	<div class="col-sm-5 col-md-offset-2">
  		<div style="margin-bottom: 10%;">
  			<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
			<a style="margin: 5px;" href="/recipes" class="btn btn-info">Recipes</a>
			<a style="margin: 5px;" href="/producs" class="btn btn-info">Products</a>
  		</div>
    	<h1 class="display-3" style="text-align:center;">Add New Recipe</h1>
  		<div>
    		<?php if($errors->any()): ?>
	      		<div class="alert alert-danger">
        			<ul>
		            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              		<li><?php echo e($error); ?></li>
            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		</ul>
    			</div><br />
    		<?php endif; ?>

			<form id=theForm method="post" action="<?php echo e(route('recipes.store')); ?>">
		        <?php echo csrf_field(); ?>

        		<div class="form-group" style="text-align:center; margin-bottom:6%;">
		            <label for="recipe_name">Recipe Name:(e.g. Spaghetti Marinara)</label><br>
            		<input type="text" class="form-control" name="recipe_name"/>
				</div>

				<div id="formIngredients" class="form-inline">
					<button id="x" type="button" class="btn btn-primary"  onclick="doOnClick()" style="margin-left: 0%;">Add Ingredient</button><br>
				</div><br>			
				
				<div class="form-group" style="text-align:center;">
		            <label for="execution">Execution Instructions:</label><br>
					<textarea wrap="soft" form="theForm" class="form-group" name="execution" style="width:100%; height:80px; "></textarea>
				</div><br>
	
				<div class="form-group" >
        			<button type="submit" class="btn btn-danger" style="margin-left:30%; width: auto; margin-top: 15px;">
			  			Add Recipe
				</div>

				<!-- extends the content of the Ingredients/Qty div (last div above).
					 The labels' and inputs' names are changed accordingly -->
				<script>
					let counter = 1; // used for naming
  					function doOnClick() {
    					let ingredientFormdiv = document.getElementById("formIngredients");	
						let ingredient_input_name = "recipeIngredients".concat(counter.toString());
						ingredient_qty_name = "recipeIngredientQty".concat(counter.toString());
    					ingredientFormdiv.innerHTML += '<br>';
						ingredientFormdiv.innerHTML += '<label for="'.concat(ingredient_input_name).concat('" class="form-group">Ingredient:</label><br>');
						ingredientFormdiv.innerHTML += '<input type="text" class="form-inline" name="'.concat(ingredient_input_name).concat('">');
						ingredientFormdiv.innerHTML += '<label for="'.concat(ingredient_qty_name).concat('" style="margin-left:5%">  Qty: </label>');
						ingredientFormdiv.innerHTML += '<input type="number" step="0.001" min="0" class="form-inline" name="'.concat(ingredient_qty_name).concat('" style="width:100px; display:inline;"> kg/L');
						counter++;
  					}	
  				</script>
      		</form>
  		</div>
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/recipes/create.blade.php ENDPATH**/ ?>
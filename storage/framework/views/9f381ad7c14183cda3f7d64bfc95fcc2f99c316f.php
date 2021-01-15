<?php $__env->startSection('main'); ?>


<div class="topnav">
  <div >
  	<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
  	<a style="margin: 5px;" href="/products" class="btn btn-info">Products</a>
  </div>   
</div>

<div class="row">
  	<div class="col-sm-12" >
		<h1 class="display-4" style="text-align:center;">Recipes</h1>
		
		<form class="form-inline" style="margin-left:80%">
			<input type="text"  size="15"  id="insearch" name="insearch" placeholder="Search for recipe" >
    		<button type="submit" class="btn btn-primary">Go</button>
		</form>
		<br>

		<a style="margin-bottom: 2%;" href="<?php echo e(route('recipes.create')); ?>" class="btn btn-primary">Add New Recipe</a>  
    	<table class="table">
      		<thead>
	        	<tr>
					<td>recipe_name </td>
					<!--<td>execution </td>
					<td>ingredient_name</td>
					<td>Qty</td>-->
          			<td colspan = 2>Actions</td>
        		</tr>
    		</thead>
      		<tbody>
        		<?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			<tr>
						<td><?php echo e($item->recipe_name); ?></td>
						<!--<td style="text-align:center;"><?php echo e($item->execution); ?></td>
						<td style="text-align:center;"><?php echo e($item->ingredient_name); ?></td>
						<td style="text-align:center;"><?php echo e($item->qty); ?></td>-->
						<td>
	              			<a href="<?php echo e(route('recipes.edit',$item->recipe_id)); ?>" class="btn btn-primary">Edit Recipe</a>
						</td>
          				<td>
		            		<form action="<?php echo e(route('recipes.destroy', $item->recipe_id)); ?>" method="post">
              					<?php echo csrf_field(); ?>
              					<?php echo method_field('DELETE'); ?>
	                				<button class="btn btn-danger" type="submit">Delete</button>
              				</form>
          				</td>
        			</tr>
        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      		</tbody>
    	</table>
  	</div>
</div>

<div class="col-sm-12">
  <?php if(session()->get('success')): ?>
    <div class="alert alert-success">
      <?php echo e(session()->get('success')); ?>  
    </div>
  <?php endif; ?>

<br>
<form action="<?php echo e(route('CreateQuestion.store')); ?>" method="post">
  <div class="form-group">
    <label for="1stquestion" style="font-size:18px" >Search for recipes containing the following ingredient: </label>
	<br>
    <input type="text" size="20" id="ingredient" name="ingredient" placeholder="ingredient" >
    <button type="submit" class="btn btn-primary">Search</button>
  </div>
</form>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/recipes/index.blade.php ENDPATH**/ ?>
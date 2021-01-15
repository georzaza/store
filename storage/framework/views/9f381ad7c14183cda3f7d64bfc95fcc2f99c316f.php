<?php $__env->startSection('main'); ?>


<div class="topnav">
  <div >
  	<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
  	<a style="margin: 5px;" href="/products" class="btn btn-info">Products</a>
  </div>   
</div>

<div>
	<h1 style="text-align:center;">Recipes</h1>
</div>

<div class="row">

	<div class="col-sm-12 ">
		<form class="form-inline" style="margin-left:80%">
			<input type="text"  size="15"  id="insearch" name="insearch" placeholder="Search for recipes" >
    		<button type="submit" class="btn btn-primary">Go</button>
		</form>	
	</div>
	<br>
	<br>

	<div class="col-sm-7" style="margin-left:10%;">
		<a style="margin-bottom: 2%;" href="<?php echo e(route('recipes.create')); ?>" class="btn btn-primary">Add New Recipe</a>
		<hr>
		<?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<a href="<?php echo e(route('recipes.show',$item->recipe_id)); ?>" style="margin-right:5%;"><?php echo e($item->recipe_name); ?></a>
			<a href="<?php echo e(route('recipes.edit',$item->recipe_id)); ?>" style="margin-right:5%;" class="btn btn-primary">Edit</a>
			<a href="<?php echo e(route('recipes.destroy',$item->recipe_id)); ?>" class="btn btn-danger">Delete</a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>

<div class="col-sm-12">
	<br>
  	<?php if(session()->get('success')): ?>
		<div class="alert alert-success">
	  		<?php echo e(session()->get('success')); ?> 
    	</div>
  	<?php endif; ?>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/recipes/index.blade.php ENDPATH**/ ?>
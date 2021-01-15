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
		<a style="margin-bottom: 2%;" href="<?php echo e(route('recipes.create')); ?>" class="btn btn-primary">Add New Recipe</a>  
    	<table class="table">
      		<thead>
	        	<tr>
					<td>recipe_name </td>
					<td> </td>
					<td>execution </td>
					<td> </td>
					<td>ingredient_name</td>
					<td> </td>
					<td>Qty</td>
					<td> </td>
          			<td colspan = 2>Actions</td>
        		</tr>
    		</thead>
      		<tbody>
        		<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			<tr>
						<td><?php echo e($item->recipe_name); ?></td>
						<td> </td>
						<td style="text-align:center;"><?php echo e($item->execution); ?></td>
						<td> </td>
						<td style="text-align:center;"><?php echo e($item->ingredient_name); ?></td>
						<td> </td>
						<td style="text-align:center;"><?php echo e($item->qty); ?></td>
						<td> </td>
						<td> </td>
						<td>
	              			<a href="<?php echo e(route('recipes.edit',$item->recipe)); ?>" class="btn btn-primary">Edit Recipe</a>
						</td>
						<td> </td>
						<td> </td>
          				<td>
		            		<form action="<?php echo e(route('recipes.destroy', $item->recipe)); ?>" method="post">
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
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/recipes/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('main'); ?>
<div class="row">
	<div class="col-sm-12">
    	<h1 class="display-3">products</h1>
	  	<div>
    		<a style="margin: 19px;" href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">New product</a>
			<a href="/recipes">See all recipes</a>
			<a href="/">Home</a>
    	</div>   
    	<table class="table table-striped">
      		<thead>
        		<tr>
		  			<td>product_name </td>
		  			<td>product_type </td>
		  			<td>product_brand </td>
          			<td>exp_date </td>
          			<td>exp_date_after_opening </td>
          			<td>opened_at </td>
          			<td>qty </td>
          			<td>price </td>
          			<td colspan = 2>Actions</td>
        		</tr>
    		</thead>
      		<tbody>
        		<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			<tr>
		  				<td><?php echo e($item->product_name); ?></td>
		  				<td><?php echo e($item->type); ?></td>
		  				<td><?php echo e($item->product_brand); ?></td>
          				<td><?php echo e($item->exp_date); ?></td>
          				<td><?php echo e($item->exp_date_after_opening); ?></td>
          				<td><?php echo e($item->opened_at); ?></td>
          				<td><?php echo e($item->qty); ?></td>
          				<td><?php echo e($item->price); ?></td>
          				<td>
              				<a href="<?php echo e(route('products.edit',$item->product_id)); ?>" class="btn btn-primary">Edit</a>
          				</td>
          				<td>
            				<form action="<?php echo e(route('products.destroy', $item->product_id)); ?>" method="post">
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
	<br>
  	<?php if(session()->get('success')): ?>
		<div class="alert alert-success">
	  		<?php echo e(session()->get('success')); ?> 
    	</div>
  	<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/products/index.blade.php ENDPATH**/ ?>
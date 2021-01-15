<?php $__env->startSection('main'); ?>

<div class="topnav">
  
  <div >
  	<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
	  <a style="margin: 5px;" href="/products" class="btn btn-info">Products</a>
  	<a style="margin: 5px;" href="/recipes" class="btn btn-info">Recipes</a>
  </div>   

</div> 

<div class="row">
<div class="col-sm-12">
    	<h1 class="display-4" style="text-align:center;">Products</h1>

		<form class="form-inline" style="margin-left:80%">
			<input type="text"  size="15"  id="insearch" name="insearch" placeholder="Search for product" >
    		<button type="submit" class="btn btn-primary">Go</button>
		</form>
		
		<br></br>
		<a style="margin-bottom: 2%;" href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Add New Product</a>  	

    	<table class="table table-striped">
      		<thead>
        		<tr>
					<td><b>Product Name</b> &emsp;</td>
          			<td><b>Expiration Date</b> &emsp;</td>
          			<td><b>Quantity</b> &emsp;</td>
					<td><b>Weight</b> &emsp;</td>
					<td><b>Details</b> &emsp;</td>
          			<td colspan = 2><b>Actions</b></td>
        		</tr>
    		</thead>
      		<tbody>

			  	<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			<tr>
		  				<td><?php echo e($item->product_name); ?></td>
          				<td><?php echo e($item->exp_date); ?></td>
          				<td><?php echo e($item->qty); ?></td>
						<td><?php echo e($item->weight); ?></td>
						<td><?php echo e($item->details); ?></td>
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

<br>
<form action="<?php echo e(route('CreateQuestion.store')); ?>" method="post">
  <div class="form-group">
    <label for="1stquestion" style="font-size:18px" >Search for recipes containing the following ingredient: </label>
	<br>
    <input type="text" size="20" id="ingredient" name="ingredient" placeholder="ingredient" >
    <button type="submit" class="btn btn-primary">Search</button>
  </div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/products/index.blade.php ENDPATH**/ ?>
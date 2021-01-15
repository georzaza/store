<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3" style="text-align:center;">Update a product</h1>

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

		<form method="post" action="<?php echo e(route('products.update', $product->product_id)); ?>">
            <?php echo method_field('PATCH'); ?>
            <?php echo csrf_field(); ?>

            <div class="form-group" style="text-align:center;">
              	<label for="product_name">Product Name: (e.g. Yogurt 5%)</label><br>
              	<input type="text" class="form-control" name="product_name" value=<?php echo e($product->product_name); ?>>
			</div>
			<br>
		  	<div class="form-group" style="text-align:center;">
              	<label for="product_brand">Product Brand: (e.g. Total)</label><br>
              	<input type="text" class="form-control" name="product_brand" value=<?php echo e($product->product_brand); ?>>
          	</div>
			<br>
			<div class="form-group" style="text-align:center;">
              	<label for="exp_date">Expiration Date:</label><br>
              	<input type="text" class="form-control" name="exp_date" value=<?php echo e($product->exp_date); ?>>
          	</div>
			<br>
			<div class="form-group" style="text-align:center;">
              	<label for="exp_date_after_opening">Exp. Date After Opening:</label><br>
            	<input type="text" class="form-control" name="exp_date_after_opening" value=<?php echo e($product->exp_date_after_opening); ?>>
			</div>
			<br>
          	<div class="form-group" style="text-align:center;">
              	<label for="opened_at">Opened At:</label><br>
              	<input type="text" class="form-control" name="opened_at" value=<?php echo e($product->opened_at); ?>>
			</div>
			<br>
          	<div class="form-group" style="text-align:center;">
              	<label for="qty">Quantity: (in kg or lb, e.g. 250 gr) </label><br>
              	<input type="number" step="0.001" min=0 class="form-control" name="qty" value=<?php echo e($product->qty); ?>>
			</div>
			<br>
          	<div class="form-group" style="text-align:center;">
              	<label for="price">Price:</label><br>
              	<input type="number" step="0.001" min=0 class="form-control" name="price" value=<?php echo e($product->price); ?>>
          	</div>
			<br>
			<div class="form-group" style="text-align:center;">
            	<label for="type">Category<br/>e.g. for Lamb Chops enter Lamb, for Yogurt 5% enter Yogurt:</label><br/>
    	    	<input type="text" class="form-control" name="type" >
			</div>
			<br>
            <button type="submit" class="btn btn-primary" style="margin-left:46.5%; margin-right:50%; margin-top:15px;">
				Update
			</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/products/edit.blade.php ENDPATH**/ ?>
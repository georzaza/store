<?php $__env->startSection('main'); ?>


<div class="topnav">
  <div >
  	<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
	  <a style="margin: 5px;" href="/products" class="btn btn-info active">Products</a>
  	<a style="margin: 5px;" href="/recipes" class="btn btn-info">Recipes</a>
  </div>   
</div>


<div class="row">
    <div class="col-sm-4 col-md-offset-4">

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

			<div class="form-group"	>    
            <label for="product_name">Product Name:</label><br/>
            	<input type="text" class="form-control" name="product_name" placeholder="e.g. Yogurt"/>
       		 </div>
		    
       		 <div class="form-group" >    
            	<label for="exp_date">Expiration Date:</label><br/>
            	<input type="date" class="form-control" name="exp_date"/>
        	</div>
        	<div class="form-group" >    
           		<label for="qty">Quantity</label><br/>
           		<input type="number" step="1" min=0 class="form-control" name="qty"/>
       		 </div>
       		 <div class="form-group" >    
           		 <label for="price">Weight:<br>(enter in Kg) </label><br/>
    	    	<input type="number" step="0.01" min=0 class="form-control" name="price"/>
        	</div>
	    	<div class="form-group" >    
           		 <label for="type">Details</label><br/>
            	<input type="text" size="40" maxlength="120" class="form-control" name="details" placeholder="e.g. with chocolate, 5% or whatever" />
        	</div>
			<br>
            <button type="submit" class="btn btn-primary" style="margin-left:40%; margin-right:50%; margin-top:15px;  margin-bottom:5%;">
				Update
			</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/products/edit.blade.php ENDPATH**/ ?>
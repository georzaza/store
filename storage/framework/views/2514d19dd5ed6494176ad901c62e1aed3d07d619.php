<?php $__env->startSection('main'); ?>
<div class="row">
  <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3" style="text-align:center;">Add a product</h1>
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
	<h4  style="text-align:center;"> Input date as:  m/d/y  OR  d-m-y</h4>
    <form method="post" action="<?php echo e(route('products.store')); ?>">
        <?php echo csrf_field(); ?>
		  
        <div class="form-group"	style="text-align:center; padding:0.5% 0.5%;>    
            <label for="product_name">Product Name: (e.g. Yogurt 5%)</label><br/>
            <input type="text" class="form-control" name="product_name"/>
        </div>
		<div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
        	<label for="product_brand">Product Brand: (e.g. Total)</label><br/>
    		<input type="text" class="form-control" name="product_brand"/>
        </div>
        <div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
            <label for="exp_date">Expiration Date:</label><br/>
            <input type="text" class="form-control" name="exp_date"/>
        </div>
        <div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
            <label for="exp_date_after_opening">Exp. Date After Opening:</label><br/>
            <input type="text" class="form-control" name="exp_date_after_opening"/>
        </div>
        <div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
            <label for="opened_at">Opened At:</label><br/>
            <input type="text" class="form-control" name="opened_at"/>
        </div>
        <div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
            <label for="qty">Quantity (in kg or L)<br>Enter real values for gr or ml:</label><br/>
            <input type="number" step="0.001" min=0 class="form-control" name="qty"/>
        </div>
        <div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
            <label for="price">Price:</label><br/>
    	    <input type="number" step="0.01" min=0 class="form-control" name="price"/>
        </div>
		<div class="form-group" style="text-align:center; padding:0.5% 0.5%;">    
            <label for="type">Category<br/>e.g. for Lamb Chops enter Lamb, for Yogurt 5% enter Yogurt:</label><br/>
    	    <input type="text" class="form-control" name="type"/>
        </div>

		<div class="form-group" style="text-align:center; padding:0.5% 0.5%;">
        	<button type="submit" class="btn btn-primary-outline" style="margin-left:46.5%; margin-right:50%; margin-top:15px;"
			  	>Add product
			</button>
		</div>
      </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bluebouris/Downloads/store/resources/views/products/create.blade.php ENDPATH**/ ?>
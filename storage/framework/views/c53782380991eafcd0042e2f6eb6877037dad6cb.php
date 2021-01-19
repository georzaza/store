<?php $__env->startSection('main'); ?>

<div class="topnav">
  <div >
  	<a style="margin: 5px;" href="/" class="btn btn-info">Home</a>
	  <a style="margin: 5px;" href="/products" class="btn btn-info active">Products</a>
  	<a style="margin: 5px;" href="/recipes" class="btn btn-info">Recipes</a>
  </div>   
</div> 

<div class="row">
<div class="col-sm-12">
    	
		<br>
		<br>
		<div>
			<a style="width: auto; margin-left:40%; " href="<?php echo e(route('products.create')); ?>" class="btn btn-success">Add New Product</a>  	
		</div>
		<br>
		<br>

		<input type="text" size="25" id="search_box" onkeyup="search_box()" placeholder="Search for product or details.." title="Type in a name">
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
      		<tbody id="products">

			  	<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			<tr>
		  				<td ><?php echo e($item->product_name); ?></td>
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

<script>
	function search_box() {
  		let input, filter, tr, td, i, txtValue;
  		input = document.getElementById('search_box');
  		filter = input.value.toUpperCase();
  		tbody = document.getElementById("products");
  		tr = tbody.getElementsByTagName('tr');

  
  		for (i = 0; i < tr.length; i++) {
    		td = tr[i].getElementsByTagName("td")[0];
    		txtValue = td.textContent || td.innerText;
			td2 =  tr[i].getElementsByTagName("td")[4];
			txtValue2 = td2.textContent || td2.innerText;
    		if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1)
      			tr[i].style.display = "";
    		else
      			tr[i].style.display = "none";
	
		}
	}
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/products/index.blade.php ENDPATH**/ ?>
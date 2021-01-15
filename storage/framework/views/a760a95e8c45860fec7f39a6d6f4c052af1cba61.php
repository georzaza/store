<?php $__env->startSection('main'); ?>
<div class="row">
  <div class="col-sm-12">
    <h1 class="display-3">customers</h1>
	  <div>
    	<a style="margin: 19px;" href="<?php echo e(route('customers.create')); ?>" class="btn btn-primary">New customer</a>
    </div>   
    <table class="table table-striped">
      <thead>
        <tr>
          <td>customerNumber </td>
          <td>Name </td>
          <td>Last Name </td>
          <td>First Name </td>
          <td>Phone </td>
          <td>Address 1 </td>
          <td>Address 2 </td>
          <td>City </td>
          <td>State </td>
          <td>Postal Code </td>
          <td>Country </td>
          <td>Sales Representative Employeer Number </td>
          <td>Credit Limit </td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
      <tbody>
        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($customer->customerNumber); ?></td>
          <td><?php echo e($customer->customerName); ?></td>
          <td><?php echo e($customer->customerLastName); ?></td>
          <td><?php echo e($customer->customerFirstName); ?></td>
          <td><?php echo e($customer->phone); ?></td>
          <td><?php echo e($customer->addressLine1); ?></td>
          <td><?php echo e($customer->addressLine2); ?></td>
          <td><?php echo e($customer->city); ?></td>
          <td><?php echo e($customer->state); ?></td>
          <td><?php echo e($customer->postalCode); ?></td>
          <td><?php echo e($customer->country); ?></td>
          <td><?php echo e($customer->salesRepEmployeeNumber); ?></td>
          <td><?php echo e($customer->creditLimit); ?></td>
          <td>
              <a href="<?php echo e(route('customers.edit',$customer->customerNumber)); ?>" class="btn btn-primary">Edit</a>
          </td>
          <td>
            <form action="<?php echo e(route('customers.destroy', $customer->customerNumber)); ?>" method="post">
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
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/customers/index.blade.php ENDPATH**/ ?>
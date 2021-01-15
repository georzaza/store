 
<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a customer</h1>

        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <br /> 
        <?php endif; ?>
        <form method="post" action="<?php echo e(route('customers.update', $customer->customerNumber)); ?>">
            <?php echo method_field('PATCH'); ?> 
            <?php echo csrf_field(); ?>
            <!--
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value=<?php echo e($customer->first_name); ?> />
            </div>
            -->
            <div class="form-group">    
              <label for="customerName">Name:</label>
              <input type="text" class="form-control" name="customerName" value=<?php echo e($customer->customerName); ?> />
            </div>
            <div class="form-group">    
                <label for="customerLastName">Last Name:</label>
                <input type="text" class="form-control" name="customerLastName" value=<?php echo e($customer->customerLastName); ?> />
            </div>
            <div class="form-group">    
                <label for="customerFirstName">First Name:</label>
                <input type="text" class="form-control" name="customerFirstName" value=<?php echo e($customer->customerFirstName); ?> />
            </div>
            <div class="form-group">    
                <label for="phone">First Name:</label>
                <input type="text" class="form-control" name="phone" value=<?php echo e($customer->phone); ?> />
            </div>
            <div class="form-group">    
                <label for="addressLine1">Address 1:</label>
                <input type="text" class="form-control" name="addressLine1" value=<?php echo e($customer->addressLine1); ?> />
            </div>
            <div class="form-group">    
                <label for="addressLine2">Address 2:</label>
                <input type="text" class="form-control" name="addressLine2" value=<?php echo e($customer->addressLine2); ?> />
            </div>
            <div class="form-group">    
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" value=<?php echo e($customer->city); ?> />
            </div>
            <div class="form-group">    
              <label for="state">State:</label>
              <input type="text" class="form-control" name="state" value=<?php echo e($customer->state); ?> />
          </div>
          <div class="form-group">    
              <label for="postalCode">Postal Code:</label>
              <input type="text" class="form-control" name="postalCode" value=<?php echo e($customer->postalCode); ?> />
          </div>
          <div class="form-group">    
              <label for="country">Country:</label>
              <input type="text" class="form-control" name="country" value=<?php echo e($customer->country); ?> />
          </div>
          <div class="form-group">    
              <label for="salesRepEmployeeNumber">Sales Represantative Referral Number:</label>
              <input type="text" class="form-control" name="salesRepEmployeeNumber" value=<?php echo e($customer->salesRepEmployeeNumber); ?> />
          </div>
          <div class="form-group">    
              <label for="creditLimit">Credit Limit:</label>
              <input type="text" class="form-control" name="creditLimit" value=<?php echo e($customer->creditLimit); ?> />
          </div> 

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dengron/laravel_installation/store/resources/views/customers/edit.blade.php ENDPATH**/ ?>
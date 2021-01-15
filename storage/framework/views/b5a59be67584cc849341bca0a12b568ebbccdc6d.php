<br>
<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Available Recipes</th>
    </tr>
  </thead>
  <tbody>

    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th scope="row"> <a href="#"><?php echo e($item); ?></a></th>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </tbody>
</table>
<?php /**PATH /home/dengron/laravel_installation/store/resources/views/Questions/answers.blade.php ENDPATH**/ ?>
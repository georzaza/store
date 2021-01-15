<form action="<?php echo e(route('CreateQuestion.store')); ?>" method="post">

  <?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="1stquestion">Show recipes containing the following ingredient: </label>
    <input type="text" class="form-control" id="ingredient" name="ingredient" placeholder="ingredient">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>


</form>
<?php /**PATH /home/bluebouris/Downloads/store/resources/views/Questions/first.blade.php ENDPATH**/ ?>
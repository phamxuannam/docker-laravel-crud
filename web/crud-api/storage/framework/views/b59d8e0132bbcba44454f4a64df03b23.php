  <?php if(Session::has('success')): ?>
      <div class="bg-green-200 border-green-600 p-4 mb-3 rounded-sm shadow-sm">
          <?php echo e(Session::get('success')); ?>

      </div>
  <?php endif; ?>

  <?php if(Session::has('error')): ?>
      <div class="bg-red-200 border-red-600 p-4 mb-3 rounded-sm shadow-sm">
          <?php echo e(Session::get('error')); ?>

      </div>
  <?php endif; ?>
<?php /**PATH C:\xampp\htdocs\crud-laravel\crud-api\resources\views/components/message.blade.php ENDPATH**/ ?>
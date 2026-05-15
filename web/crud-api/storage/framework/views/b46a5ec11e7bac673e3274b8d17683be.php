  
  <?php if(Session::has('success')): ?>
      <div id="success-alert" class="bg-green-200 border-green-600 p-4 mb-3 rounded-sm shadow-sm">
          <?php echo e(Session::get('success')); ?>

      </div>
  <?php endif; ?>

  <?php if(Session::has('error')): ?>
      <div id="error-alert" class="bg-red-200 border-red-600 p-4 mb-3 rounded-sm shadow-sm">
          <?php echo e(Session::get('error')); ?>

      </div>
  <?php endif; ?>

  <script>
      setTimeout(() => {
          $('#success-alert').fadeOut();
          $('#error-alert').fadeOut();
      }, 3000);
  </script>
<?php /**PATH /var/www/html/crud-api/resources/views/components/message.blade.php ENDPATH**/ ?>
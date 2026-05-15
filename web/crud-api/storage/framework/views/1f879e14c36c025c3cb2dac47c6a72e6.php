<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($i + 1); ?></td>
        <td><?php echo e($user->name); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td><?php echo e($user->age); ?></td>
        <td><?php echo e($user->created_at); ?></td>
        <td><?php echo e($user->updated_at); ?></td>
        <td>
            <a href="#" class="btn btn-sm btn-info showBtn" data-id="<?php echo e($user->id); ?>"
                data-name=<?php echo e($user->name); ?> data-email=<?php echo e($user->email); ?> data-password=<?php echo e($user->password); ?>

                data-age=<?php echo e($user->age); ?> data-created=<?php echo e($user->created_at); ?> data-admin=<?php echo e($user->isAmin); ?>>
                <i class="las la-info"></i>
            </a>
            <a href="#" class="btn btn-sm btn-success editBtn" data-id=<?php echo e($user->id); ?>

                data-name=<?php echo e($user->name); ?> data-email=<?php echo e($user->email); ?> data-age=<?php echo e($user->age); ?>

                data-admin=<?php echo e($user->isAdmin); ?>>
                <i class="las la-edit"></i>
            </a>
            <a href="#" class="btn btn-sm btn-danger deleteBtn" data-id=<?php echo e($user->id); ?>>
                <i class="las la-times"></i>
            </a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\crud-laravel\crud-api\resources\views/web/users/users-data.blade.php ENDPATH**/ ?>
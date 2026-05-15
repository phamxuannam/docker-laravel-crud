<?php if($permissions->isNotEmpty()): ?>
    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="row<?php echo e($permission->id); ?>" class="border-b">
            <td class="px-6 py-3 text-left"> <?php echo e($permission->id); ?> </td>
            <td class="px-6 py-3 text-left"> <?php echo e($permission->name); ?> </td>
            <td class="px-6 py-3 text-left">
                
                <?php echo e(\Carbon\Carbon::parse($permission->created_at)->format('d M, Y')); ?></td>
            <td class="px-6 py-3 text-center">

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit permissions')): ?>
                    <a href="<?php echo e(route('permissions.edit', $permission->id)); ?>"
                        class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600 ">Edit</a>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete permissions')): ?>
                    
                    <a href="#" data-id="<?php echo e($permission->id); ?>"
                        class="bg-red-700 text-sm rounded-md text-white px-3 py-2 hover:bg-red-600 deleteBtn">Delete</a>
                <?php endif; ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/crud-api/resources/views/permissions/permission-data.blade.php ENDPATH**/ ?>
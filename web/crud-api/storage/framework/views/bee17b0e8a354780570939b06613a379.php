<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="row-">
        <th scope="row"><?php echo e($i + 1); ?></th>
        <td><?php echo e($product->name); ?></td>
        <td><?php echo e($product->price); ?></td>
        <td><?php echo e($product->quantity); ?></td>
        <td><?php echo e($product->created_at); ?></td>
        <td><?php echo e($product->updated_at); ?></td>
        <td>
            
            <a href="#" class="btn btn-sm btn-success editBtn" data-id=<?php echo e($product->id); ?>

                data-name=<?php echo e($product->name); ?> data-price=<?php echo e($product->price); ?> data-quantity=<?php echo e($product->quantity); ?>>
                <i class="las la-edit"></i>
            </a>

            <a href="#" class="btn btn-sm btn-danger deleteBtn" data-id=<?php echo e($product->id); ?>>
                <i class="las la-times"></i>
            </a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/crud-api/resources/views/web/products/products-data.blade.php ENDPATH**/ ?>
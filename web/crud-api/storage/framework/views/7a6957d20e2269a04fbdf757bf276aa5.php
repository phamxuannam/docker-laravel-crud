<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <?php echo e(__('Accounts')); ?>

            </h2>
            <a href="<?php echo e(route('accounts.create')); ?>"
                class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            
            <?php if (isset($component)) { $__componentOriginal88b0e6813f5b80100a19437aa80e29ba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.message','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $attributes = $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $component = $__componentOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>

            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left" width="60">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left" width="180">Created</th>
                        <th class="px-6 py-3 text-center" width="180">Action</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    <?php if($accounts->isNotEmpty()): ?>
                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="row-" class="border-b">
                                <td class="px-6 py-3 text-left"> <?php echo e($account->id); ?> </td>
                                <td class="px-6 py-3 text-left"> <?php echo e($account->name); ?> </td>
                                <td class="px-6 py-3 text-left"> <?php echo e($account->email); ?> </td>
                                <td class="px-6 py-3 text-left">
                                    
                                    <?php echo e(\Carbon\Carbon::parse($account->created_at)->format('d M, Y')); ?></td>
                                <td class="px-6 py-3 text-center">
                                    <a href="<?php echo e(route('accounts.edit', $account->id)); ?>"
                                        class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600 ">Edit</a>

                                    
                                    <a href="javascript:void(0);" data-id="<?php echo e($account->id); ?>"
                                        class="bg-red-700 text-sm rounded-md text-white px-3 py-2 hover:bg-red-600 deleteBtn">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div id="pagination" class="my-3">
                <?php echo e($accounts->links()); ?>

            </div>
        </div>
    </div>

     <?php $__env->slot('script', null, []); ?> 

        <script>
            $(document).on('click', '.deleteBtn', function(e) {
                e.preventDefault();
                if (!confirm('Ban co chac muon xoa khong?')) return;
                let id = $(this).data('id');
                $.ajax({
                    url: "<?php echo e(route('articles.destroy', ':id')); ?>".replace(':id', id),
                    method: 'DELETE',
                    headers: {
                        'x-csrf-token': '<?php echo e(csrf_token()); ?>'
                    },
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $('#row-' + id).remove();
                        window.location.href = "<?php echo e(route('articles.index')); ?>";
                    }
                });
            });
        </script>
     <?php $__env->endSlot(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

<style>
    #pagination {
        display: flex !important;
        flex-wrap: nowrap !important;
        overflow-x: auto !important;
        -webkit-overflow-scrolling: touch;
        gap: 0.5rem;
        padding-bottom: 0.5rem;
    }

    #pagination li,
    #pagination .page-item {
        display: inline-block !important;
        /* hoặc flex-shrink: 0 */
        flex-shrink: 0 !important;
        white-space: nowrap !important;
    }
</style>
<?php /**PATH /var/www/html/crud-api/resources/views/accounts/list.blade.php ENDPATH**/ ?>
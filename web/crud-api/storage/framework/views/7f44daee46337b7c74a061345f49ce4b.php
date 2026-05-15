 



 <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="editModalLabel">Update Product</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="editProduct" enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>


                 <input type="hidden" name="id" id="edit_id">

                 <div class="modal-body">

                     <div class="mb-3">
                         <label for="name" class="col-form-label">Name:</label>
                         <input type="text" name="name" id="edit_name" value="<?php echo e(old('name')); ?>"
                             class="form-control">
                         <span class="text-danger error-text name_error"></span>
                     </div>

                     <div class="mb-3">
                         <label for="message-text" class="col-form-label">Price:</label>
                         <input type="number" name="price" id="edit_price" value="<?php echo e(old('price')); ?>"
                             class="form-control">
                         <span class="text-danger error-text price_error"></span>
                     </div>

                     <div class="mb-3">
                         <label for="message-text" class="col-form-label">Quantity:</label>
                         <input type="number" name="quantity" id="edit_quantity" value="<?php echo e(old('quantity')); ?>"
                             class="form-control">
                         <span class="text-danger error-text quantity_error"></span>
                     </div>

                     <div class="mb-3">
                         <label for="message-text" class="col-form-label">Account Name:</label>
                         <input type="hidden" name="userId" value="<?php echo e(Auth::id()); ?>">
                         <input type="text" value="<?php echo e(old('userId', Auth::user()->name)); ?>" class="form-control"
                             id="price" disabled>
                     </div>
                 </div>

                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>

             </form>
         </div>
     </div>
 </div>
<?php /**PATH C:\xampp\htdocs\crud-laravel\crud-api\resources\views/web/products/edit.blade.php ENDPATH**/ ?>
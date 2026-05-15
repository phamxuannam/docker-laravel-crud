<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Create Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addUser" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control"
                            id="name">
                        <span class="text-danger error-text name_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control"
                            id="email">
                        <span class="text-danger error-text email_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Password:</label>
                        <input type="text" name="password" value="<?php echo e(old('password')); ?>" class="form-control"
                            id="password">
                        <span class="text-danger error-text password_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Age:</label>
                        <input type="number" name="age" value="<?php echo e(old('age')); ?>" class="form-control"
                            id="age">
                        <span class="text-danger error-text age_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Create By:</label>
                        <input type="text" value="<?php echo e(Auth::user()->name); ?>" class="form-control" disabled>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/crud-api/resources/views/web/users/create.blade.php ENDPATH**/ ?>
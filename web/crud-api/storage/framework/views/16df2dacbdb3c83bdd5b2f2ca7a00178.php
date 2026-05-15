<div class="modal fade" id="showUserModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Infomation Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="showUser" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control"
                            id="show_name" disabled>
                        <span class="text-danger error-text name_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control"
                            id="show_email" disabled>
                        <span class="text-danger error-text email_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Password:</label>
                        <input type="email" name="password" value="<?php echo e(old('password')); ?>" class="form-control"
                            id="show_password" disabled>
                        <span class="text-danger error-text email_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Age:</label>
                        <input type="number" name="age" value="<?php echo e(old('age')); ?>" class="form-control"
                            id="show_age" disabled>
                        <span class="text-danger error-text age_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">isAdmin:</label>
                        <input type="text" name="admin" value="<?php echo e(old('isAdmin')); ?>" class="form-control"
                            id="show_admin" disabled>
                        <span class="text-danger error-text password_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Created_at:</label>
                        <input type="text" name="created_at" value="<?php echo e(old('created_at')); ?>" class="form-control"
                            id="show_created" disabled>
                        <span class="text-danger error-text password_error"></span>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/crud-api/resources/views/web/users/show.blade.php ENDPATH**/ ?>
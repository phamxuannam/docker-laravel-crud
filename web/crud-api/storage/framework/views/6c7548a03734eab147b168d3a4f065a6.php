<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Document</title>

</head>

<body>

    

    <div class="container bg-light py-4">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="d-flex justify-content-between">
                    <span> <i class="lab la-amazon"></i> Product Management </span>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addProductModal">Add Product</button>
                </h2>
                <h4 class="text-success my-4 success_message"></h4>
                
                <div class="table-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php echo $__env->make('web.products.products-data', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-center">
                        <?php echo e($products->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php echo $__env->make('web.products.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;
    <?php echo $__env->make('web.products.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;
    <?php echo $__env->make('web.products.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

</body>

</html>
<?php /**PATH /var/www/html/crud-api/resources/views/web/products/index.blade.php ENDPATH**/ ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <h1 class="text-center mb-4">Products</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <div class="card h-100 text-center">
                <img src="<?php echo e($product->image_url); ?>" class="card-img-top img-fluid" alt="<?php echo e($product->name); ?>">
                <div class="card-body">
                    <h5 class="card-title text-truncate"><?php echo e($product->title); ?></h5>
                    <p class="card-text text-muted"><?php echo e($product->description); ?></p>
                    <p class="fw-bold text-primary">$<?php echo e(number_format($product->price, 2)); ?></p>
                    <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-outline-primary btn-sm mb-2">View Product</a>
                    <?php if(Auth::check() && Auth::user()->is_admin): ?>
                        <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-outline-warning btn-sm mb-2">Edit Product</a>
                        <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete Product</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\Users\Paul David\ecommerce-tutorial-main\resources\views/products/index.blade.php ENDPATH**/ ?>
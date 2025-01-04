  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <?php echo $__env->make('partials.tailwind-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>

<div class="container mx-auto">
<div class="bg-white shadow rounded-lg p-4">
    <img class="w-full h-48 object-cover rounded" src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>">
    <h5 class="text-lg font-bold"><?php echo e($product->title); ?></h5>
    <p class="text-gray-700"><?php echo e($product->description); ?></p>
    <p class="text-gray-900 font-bold"><?php echo e($product->price); ?></p>
    <form action="<?php echo e(route('cart.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit">Add to Cart</button>
    </form>
    <a href="<?php echo e(route('products.index')); ?>">View All Product</a>
</div>
</div><?php /**PATH C:\Users\Paul David\ecommerce-tutorial-main\resources\views/products/show.blade.php ENDPATH**/ ?>
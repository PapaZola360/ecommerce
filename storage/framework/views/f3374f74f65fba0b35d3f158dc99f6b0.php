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
        <img class="w-full h-48 object-cover rounded" src="<?php echo e($category->image_url); ?>" alt="<?php echo e($category->name); ?>">
        <h5 class="text-lg font-bold"><?php echo e($category->name); ?></h5>
        <p class="text-gray-700"><?php echo e($category->desctipion); ?></p>
        <a href="<?php echo e(route('categories.index')); ?>">View All Categories</a>
    </div>
    </div><?php /**PATH C:\Users\Paul David\ecommerce-tutorial-main\resources\views/categories/show.blade.php ENDPATH**/ ?>
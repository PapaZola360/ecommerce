<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Ecommerce</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .hero-section {
                background-size: cover;
                background-position: center;
                height: 500px;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
            }

            .hero-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
            }

            .hero-content {
                position: relative;
                z-index: 10;
                text-align: center;
            }

            .card:hover {
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                transition: 0.3s ease-in-out;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid p-0">
            <header class="py-4 bg-light shadow-sm">
                <div class="container d-flex justify-content-between align-items-center">
                    <h1 class="h4 mb-0">Game Shopping</h1>
                    <nav>
                        <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-primary">Dashboard</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn btn-primary me-2">Log in</a>
                                <?php if(Route::has('register')): ?>
                                    <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-primary">Register</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </nav>
                </div>
            </header>

            <div class="hero-section" style="background-image: url('https://upload.wikimedia.org/wikipedia/en/thumb/8/82/Game_On%21_title_card.png/330px-Game_On%21_title_card.png');">
                <div class="hero-overlay"></div>
                <div class="hero-content text-white">
                    <h1 class="display-4 fw-bold mb-3">Welcome to My Shop</h1>
                    <p class="fs-5 mb-4">We Have Great Items</p>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-lg btn-primary">Shop Now</a>
                </div>
            </div>

            <div class="container my-5">
                <h2 class="text-center mb-4">Featured Products</h2>
                <div class="row g-4">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="card h-100 text-center">
                                <img src="<?php echo e($product->image_url); ?>" class="card-img-top img-fluid" alt="<?php echo e($product->name); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                    <p class="card-text"><?php echo e($product->description); ?></p>
                                    <p class="fw-bold">$<?php echo e(number_format($product->price, 2)); ?></p>
                                    <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-outline-primary">View Product</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="container my-5">
                <h2 class="text-center mb-4">Thank You for Shopping with Us</h2>
                <div class="row g-4">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="card h-100 text-center">
                                <img src="<?php echo e($category->image_url); ?>" class="card-img-top img-fluid" alt="<?php echo e($category->name); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($category->name); ?></h5>
                                    <a href="<?php echo e(route('categories.show', $category->id)); ?>" class="btn btn-outline-primary">View Category</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
<?php /**PATH C:\Users\Paul David\ecommerce-tutorial-main\resources\views/welcome.blade.php ENDPATH**/ ?>
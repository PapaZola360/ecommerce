<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Shopping Cart</h1>
    
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <?php echo e($message); ?>

        </div>
    <?php endif; ?>

    <?php if($cartItems->isEmpty()): ?>
        <p class="text-muted">Your cart is empty.</p>
    <?php else: ?>
        <div class="bg-white shadow rounded-lg p-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cartItem->product->name); ?></td>
                            <td>
                                <form action="<?php echo e(route('cart.update', $cartItem->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="number" name="quantity" value="<?php echo e($cartItem->quantity); ?>" class="form-control w-25 d-inline-block" min="1">
                                    <button type="submit" class="btn btn-primary btn-sm ml-2">Update</button>
                                </form>
                            </td>
                            <td>$<?php echo e(number_format($cartItem->product->price, 2)); ?></td>
                            <td>$<?php echo e(number_format($cartItem->product->price * $cartItem->quantity, 2)); ?></td>
                            <td>
                                <form action="<?php echo e(route('cart.destroy', $cartItem->id)); ?>" method="POST" class="d-inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>  
        </div>
        <div class="mt-4 text-center">
            <a href="<?php echo e(route('checkout.show')); ?>" class="btn btn-success">Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php /**PATH C:\Users\Paul David\ecommerce-tutorial-main\resources\views/cart/index.blade.php ENDPATH**/ ?>
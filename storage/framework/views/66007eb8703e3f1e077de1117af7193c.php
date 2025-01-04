<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Checkout</h1>
    <form action="<?php echo e(route('checkout.process')); ?>" method="POST" id="checkout-form">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label for="shipping_address" class="form-label">Shipping Address</label>
            <input type="text" name="shipping_address" id="shipping_address" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="state" class="form-label">State</label>
            <input type="text" name="state" id="state" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input type="text" name="postal_code" id="postal_code" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="country" class="form-label">Country</label>
            <input type="text" name="country" id="country" class="form-control" required>
        </div>
        <div class="mb-4">
            <h2 class="h4 font-weight-bold mb-3">Order Summary</h2>
            <ul class="list-unstyled">
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($cartItem->product->name); ?> x <?php echo e($cartItem->quantity); ?> - $<?php echo e($cartItem->product->price * $cartItem->quantity); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <p class="h5 font-weight-bold mt-3">Total: $<?php echo e($cartItems->sum(function($item) { return $item->product->price * $item->quantity; })); ?></p>
        </div>
        <div class="mb-4">
            <label for="card-element" class="form-label">Credit or Debit Card:</label>
            <div id="card-element" class="form-control"></div>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">Submit Payment</button>
    </form>
</div>

<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('<?php echo e(env('STRIPE_KEY')); ?>');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.getElementById('checkout-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const { token, error } = await stripe.createToken(cardElement);

        if (error) {
            console.error(error);
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        }
    });
</script>
</body>
<?php /**PATH C:\Users\Paul David\ecommerce-tutorial-main\resources\views/checkout/index.blade.php ENDPATH**/ ?>
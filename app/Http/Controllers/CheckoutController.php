<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Stripe;
use Stripe\Charge;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function show()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('checkout.index', compact('cartItems')); 
    }

    public function process(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'stripeToken' => 'required'
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        //calculate total amount
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $totalAmount = $cartItems->sum(function ($item){
            return $item->product->price * $item->quantity;
        });

        $charge = Charge::create([
            'amount' => $totalAmount * 100,
            'currency' => 'usd',
            'description' => 'Order description',
            'source' => $request->stripeToken,
            'metadata' => ['order_id' => uniqid()],
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'shipping_address' => $request->shipping_address . ', ' . $request->city . ', ' . $request->state . ', ' . $request->postal_code . ', ' . $request->country,
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'payment_method' => 'stripe',
            'stripe_payment_id' =>$charge->id,
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
        }

        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('home')->with('success','Payment Successful! Your order has been placed.');

    }
}

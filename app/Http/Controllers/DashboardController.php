<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    $orders = Order::where('user_id',auth()->id())->with('user')->get();
    return view('dashboard', compact('orders'));
    }
}

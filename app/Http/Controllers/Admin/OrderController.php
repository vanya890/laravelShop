<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return redirect()->route('orders');
    }
    public function orders()
    {
        $orders = Order::where('status', 1)->get();
        return view('auth.orders.index', compact('orders'));
    }
    public function order($orderId){
        $order = Order::findOrFail($orderId);
        return view('auth.orders.order', compact('order'));
    }
    public function orderDelete($orderId){
        $order = Order::findOrFail($orderId);
        $order->delete();
        session()->flash('warning','Заказ удалён');
        return redirect()->route('home');
    }
}

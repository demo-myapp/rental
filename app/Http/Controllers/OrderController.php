<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::with(['product'])->orderBy('created_at', 'DESC')->get();

        return view('orders.index', compact('order'));
    }

    public function create()
    {
        $product = Product::orderBy('name', 'DESC')->get();

        return view('orders.create', compact('product'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'email' => 'required',
            'telp' => 'required',
            'id' => 'required'
        ]);

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'telp' => $request->telp,
            'id' => $request->id,
            'price' => $request->price
        ]);

        Mail::send('orders.email', array(
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'telp' => $request->telp,
            'id' => $request->id,
            'price' => $request->price
        ), function ($message) use ($request) {
            $message->from('test@admin.com');
            $message->to($request->email);
        });

        return redirect(route('order.index'))->with('success', 'New Orders Added!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect(route('order.index'))->with('success', 'Order Confirmed & Your car list was deleted!');
    }
}

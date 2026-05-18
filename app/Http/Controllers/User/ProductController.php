<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }
        
        if ($request->filled('genre')) {
            $genre = $request->genre;
            $query->whereHas('category', function($q) use ($genre) {
                $q->where('name', $genre);
            });
        }
        
        // !! PENTING: HARUS 15, BUKAN 8 !!
        $products = $query->latest()->paginate(15);
        
        $categories = Category::all();
        
        return view('user.products', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('user.detail', compact('product'));
    }

    public function purchase($id)
    {
        $product = Product::findOrFail($id);

        $order = Order::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'total' => $product->price,
            'status' => 'pending',
        ]);

        return redirect()->route('user.payment.form', $order->id);
    }

    public function showPaymentForm($orderId)
    {
        $order = Order::with('product')->findOrFail($orderId);

        if ($order->user_id != auth()->id()) {
            abort(403);
        }

        return view('user.payment', compact('order'));
    }

    public function processPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->user_id != auth()->id()) {
            abort(403);
        }

        $order->status = 'paid';
        $order->save();

        return redirect()->route('user.payment.success', $order->id);
    }

    public function paymentSuccess($orderId)
    {
        $order = Order::with('product')->findOrFail($orderId);
        return view('user.payment-success', compact('order'));
    }
}
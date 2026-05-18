<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Tampilkan form checkout
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('user.cart.index')->with('error', 'Keranjang kosong, gak bisa checkout.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('user.checkout', compact('cart', 'total'));
    }
public function process(Request $request)
{
    $cart = session()->get('cart', []);

    if (!$cart) {
        return redirect()->route('user.products');
    }

    $total = 0;

    foreach ($cart as $id => $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // BUAT ORDER DENGAN SEMUA KOLOM
    $order = \App\Models\Order::create([
        'user_id' => auth()->id(),
        'customer_name' => auth()->user()->name, // NAMA DARI USER LOGIN
        'total' => $total,
        'payment_method' => $request->payment_method ?? 'Transfer Bank',
        'status' => 'paid'
    ]);

    // SIMPAN ITEM
    foreach ($cart as $id => $item) {
        \App\Models\OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $id,
            'quantity' => $item['quantity'],
            'price' => $item['price']
        ]);
    }

    // KOSONGKAN KERANJANG
    session()->forget('cart');

    // LANGSUNG KE HALAMAN STRUK
    return redirect()->route('user.checkout.success', $order->id);
}
    public function success($id)
    {
        $order = \App\Models\Order::with('items.product')
                    ->findOrFail($id);

        return view('user.checkout-success', compact('order'));
    }
}
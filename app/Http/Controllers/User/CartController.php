<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Tampilkan isi keranjang
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('user.cart', compact('cart'));
    }

    /**
     * Tambah produk ke keranjang
     */
    public function add($id)
{
    $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "title" => $product->title,
            "price" => $product->price,
            "image" => $product->image,
            "quantity" => 1
        ];
    }

    session()->put('cart', $cart);

    return redirect('/home')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
}

    /**
     * Update quantity produk di keranjang (masih ada, tapi gak dipakai)
     */
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->route('user.cart.index')->with('success', 'Keranjang diperbarui');
    }

    /**
     * Hapus produk dari keranjang
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('user.cart.index')->with('success', 'Produk dihapus dari keranjang');
    }

    /**
     * Tambah quantity produk di keranjang (tombol +)
     */
    public function increment($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }
        return redirect()->route('user.cart.index')->with('success', 'Jumlah produk ditambah');
    }

    /**
     * Kurangi quantity produk di keranjang (tombol -)
     * Kalau quantity tinggal 1, otomatis hapus dari keranjang
     */
    public function decrement($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
                session()->put('cart', $cart);
            } else {
                // Jika quantity 1, hapus aja
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }
        return redirect()->route('user.cart.index')->with('success', 'Jumlah produk dikurang');
    }
}
<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bag;
use App\Models\Cart;
use App\Models\Shoe;
use App\Models\Tent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

abstract class Controller
{
    //
}
class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'bags' => Bag::findWithStatus(1),
            'shoes' => Shoe::findWithStatus(1),
            'tents' => Tent::findWithStatus(1)
        ]);
    }
}
class ItemController extends Controller
{   
    public function adminPage()
    {
        // Mengambil data barang yang sedang disewakan
        $bags = Bag::where('status', 0)->get();
        $shoes = Shoe::where('status', 0)->get();
        $tents = Tent::where('status', 0)->get();

        // Mengambil data transaksi
        $transactions = Cart::where('status_konfirmasi', 1)
            ->with(['user', 'bag', 'shoe', 'tent'])
            ->get();

        // Mengambil total pemasukan bulanan
        $totalIncome = $transactions->sum('total_harga');
        // Mengambil 10 transaksi dengan total harga tertinggi
        $topTransactions = Cart::where('status_konfirmasi', 1)
            ->with(['user', 'bag', 'shoe', 'tent'])
            ->orderBy('total_harga', 'desc')
            ->take(10)
            ->get();

        return view('admin', compact('bags', 'shoes', 'tents', 'transactions', 'totalIncome', 'topTransactions'));
    }
    public function changeStatus(Request $request, $id)
    {
        $itemType = $request->input('item_type');
        switch($itemType) {
            case 'bag':
                $item = Bag::find($id);
                break;
            case 'shoe':
                $item = Shoe::find($id);
                break;
            case 'tent':
                $item = Tent::find($id);
                break;
            default:
                return redirect()->back()->with('error', 'Item type tidak valid');
        }

        if ($item) {
            $item->status = 1;
            $item->save();
            return redirect()->back()->with('success', 'Status berhasil diubah');
        }

        return redirect()->back()->with('error', 'Item tidak ditemukan');
    }
}
class ControllerOrder extends Controller
{
    public function showBagConfirmation(Request $request)
    {
        $validatedData = $request->validate([
            'bag_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);
    
        $user_id = $validatedData['user_id'];
        $bag_id = $validatedData['bag_id'];
        $bag = Bag::findOrFail($bag_id);
    
        return view('bag_konfirmasi', [
            'user_id' => $user_id,
            'bag' => $bag,
            'totalHarga' => $bag->price,
        ]);
    }
    public function showShoeConfirmation(Request $request)
    {
        $validatedData = $request->validate([
            'shoe_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);
    
        $user_id = $validatedData['user_id'];
        $shoe_id = $validatedData['shoe_id'];
        $shoe = Shoe::findOrFail($shoe_id);
    
        return view('shoe_konfirmasi', [
            'user_id' => $user_id,
            'shoe' => $shoe,
            'totalHarga' => $shoe->price,
        ]);
    }
    public function showTentConfirmation(Request $request)
    {
        $validatedData = $request->validate([
            'tent_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);
    
        $user_id = $validatedData['user_id'];
        $tent_id = $validatedData['tent_id'];
        $tent = Tent::findOrFail($tent_id);
    
        return view('tent_konfirmasi', [
            'user_id' => $user_id,
            'tent' => $tent,
            'totalHarga' => $tent->price,
        ]);
    }




    public function handleConfirmationbag(Request $request)
    {
        $validatedData = $request->validate([
            'bag_id' => 'required|integer',
            'user_id' => 'required|integer',
            // 'jumlah' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'harga' => 'required|integer'
        ]);

        $id = $validatedData['bag_id'];
        $user_id = $validatedData['user_id'];
        // $jumlah = $validatedData['jumlah'];
        $paymentMethod = $validatedData['payment_method'];
        $harga = $validatedData['harga'];
        // Simpan data penyewaan ke database atau proses sesuai kebutuhan
        // Contoh sederhana:
        $cart = new cart();
        $cart->bag_id = $id;
        $cart->total_harga = $harga;
        $cart->metode = $paymentMethod;
        $cart->status_konfirmasi = 1;
        $cart->id_user = $user_id;
        $cart->save();

        $bag = Bag::findOrFail($id);
        $bag->update(['status' => 0]);; // atau status lain yang sesuai
        $bag->save();
    

        return redirect()->route('home')->with('success', 'Penyewaan berhasil dikonfirmasi.');
    }

    public function handleConfirmationshoe(Request $request)
    {
        $validatedData = $request->validate([
            'shoe_id' => 'required|integer',
            'user_id' => 'required|integer',
            // 'jumlah' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'harga' => 'required|integer'
        ]);

        $id = $validatedData['shoe_id'];
        $user_id = $validatedData['user_id'];
        // $jumlah = $validatedData['jumlah'];
        $paymentMethod = $validatedData['payment_method'];
        $harga = $validatedData['harga'];
        // Simpan data penyewaan ke database atau proses sesuai kebutuhan
        // Contoh sederhana:
        $cart = new cart();
        $cart->shoe_id = $id;
        $cart->total_harga = $harga;
        $cart->metode = $paymentMethod;
        $cart->status_konfirmasi = 1;
        $cart->id_user = $user_id;
        $cart->save();
        
        $shoe = Shoe::findOrFail($id);
        $shoe->update(['status' => 0]);; // atau status lain yang sesuai
        $shoe->save();
    

        return redirect()->route('home')->with('success', 'Penyewaan berhasil dikonfirmasi.');
    }

    public function handleConfirmationtent(Request $request)
    {
        $validatedData = $request->validate([
            'tent_id' => 'required|integer',
            'user_id' => 'required|integer',
            // 'jumlah' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'harga' => 'required|integer'
        ]);

        $id = $validatedData['tent_id'];
        $user_id = $validatedData['user_id'];
        // $jumlah = $validatedData['jumlah'];
        $paymentMethod = $validatedData['payment_method'];
        $harga = $validatedData['harga'];
        // Simpan data penyewaan ke database atau proses sesuai kebutuhan
        // Contoh sederhana:
        $cart = new cart();
        $cart->tent_id = $id;
        $cart->total_harga = $harga;
        $cart->metode = $paymentMethod;
        $cart->status_konfirmasi = 1;
        $cart->id_user = $user_id;
        $cart->save();

            
        $tent = Tent::findOrFail($id);
        $tent->update(['status' => 0]);; // atau status lain yang sesuai
        $tent->save();
    

        return redirect()->route('home')->with('success', 'Penyewaan berhasil dikonfirmasi.');
    }
}


class CartController extends Controller
{
    public function viewCart()
    {
        $userId = auth()->id();
        $cart = Cart::where('id_user', $userId)->where('status_konfirmasi', 0)->first();

        return view('cart', compact('cart'));
    }

    public function addToCartbag(Request $request)
    {
        $validatedData = $request->validate([
            'bag_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $bag_id = $validatedData['bag_id'];
        $user_id = $validatedData['user_id'];

        // Cari cart yang belum dikonfirmasi untuk user ini
        $cart = Cart::where('id_user', $user_id)->where('status_konfirmasi', 0)->first();

        if (!$cart) {
            // Jika tidak ada cart, buat yang baru
            $cart = new Cart();
            $cart->id_user = $user_id;
            $cart->bag_id = $bag_id;
            $cart->total_harga = 0; // Sesuaikan dengan logika perhitungan harga total Anda
            $cart->status_konfirmasi = 0;
            $cart->save();
        } else {
            // Jika sudah ada cart, perbarui bag_id-nya
            $cart->bag_id = $bag_id;
            $cart->save();
        }

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }
    public function addToCartshoe(Request $request)
    {
        $validatedData = $request->validate([
            'shoe_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $shoe_id = $validatedData['shoe_id'];
        $user_id = $validatedData['user_id'];

        // Cari cart yang belum dikonfirmasi untuk user ini
        $cart = Cart::where('id_user', $user_id)->where('status_konfirmasi', 0)->first();

        if (!$cart) {
            // Jika tidak ada cart, buat yang baru
            $cart = new Cart();
            $cart->id_user = $user_id;
            $cart->shoe_id = $shoe_id;
            $cart->total_harga = 0; // Sesuaikan dengan logika perhitungan harga total Anda
            $cart->status_konfirmasi = 0;
            $cart->save();
        } else {
            // Jika sudah ada cart, perbarui shoe_id-nya
            $cart->shoe_id = $shoe_id;
            $cart->save();
        }

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }
    public function addToCarttent(Request $request)
    {
        $validatedData = $request->validate([
            'tent_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $tent_id = $validatedData['tent_id'];
        $user_id = $validatedData['user_id'];

        // Cari cart yang belum dikonfirmasi untuk user ini
        $cart = Cart::where('id_user', $user_id)->where('status_konfirmasi', 0)->first();

        if (!$cart) {
            // Jika tidak ada cart, buat yang baru
            $cart = new Cart();
            $cart->id_user = $user_id;
            $cart->tent_id = $tent_id;
            $cart->total_harga = 0; // Sesuaikan dengan logika perhitungan harga total Anda
            $cart->status_konfirmasi = 0;
            $cart->save();
        } else {
            // Jika sudah ada cart, perbarui tent_id-nya
            $cart->tent_id = $tent_id;
            $cart->save();
        }

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }

    public function createCart()
    {
        $userId = auth()->id();

        // Cek apakah user sudah memiliki cart dengan status konfirmasi 0
        $existingCart = Cart::where('id_user', $userId)->where('status_konfirmasi', 0)->first();
        if (!$existingCart) {
            // Buat cart baru untuk user
            Cart::create([
                'bag_id' => 0,
                'shoe_id' => 0,
                'tent_id' => 0,
                'total_harga' => 0,
                'status_konfirmasi' => 0,
                'id_user' => $userId
            ]);

            return redirect()->back()->with('success', 'Keranjang baru berhasil dibuat');
        }

        return redirect()->back()->with('success', 'Anda sudah memiliki keranjang aktif');
    }

    public function removeBag(Request $request)
    {
        $validatedData = $request->validate([
            'cart_id' => 'required|integer',
        ]);

        $cart_id = $validatedData['cart_id'];

        // Cari cart berdasarkan id
        $cart = Cart::find($cart_id);

        if ($cart) {
            // Ubah bag_id menjadi 0
            $cart->bag_id = 0;
            $cart->save();

            return redirect()->back()->with('success', 'Item removed from cart successfully.');
        } else {
            return redirect()->back()->with('error', 'Cart not found.');
        }
    }
    public function removeShoe(Request $request)
    {
        $validatedData = $request->validate([
            'cart_id' => 'required|integer',
        ]);

        $cart_id = $validatedData['cart_id'];

        // Cari cart berdasarkan id
        $cart = Cart::find($cart_id);

        if ($cart) {
            // Ubah shoe_id menjadi 0
            $cart->shoe_id = 0;
            $cart->save();

            return redirect()->back()->with('success', 'Item removed from cart successfully.');
        } else {
            return redirect()->back()->with('error', 'Cart not found.');
        }
    }
    public function removeTent(Request $request)
    {
        $validatedData = $request->validate([
            'cart_id' => 'required|integer',
        ]);

        $cart_id = $validatedData['cart_id'];

        // Cari cart berdasarkan id
        $cart = Cart::find($cart_id);

        if ($cart) {
            // Ubah tent_id menjadi 0
            $cart->tent_id = 0;
            $cart->save();

            return redirect()->back()->with('success', 'Item removed from cart successfully.');
        } else {
            return redirect()->back()->with('error', 'Cart not found.');
        }
    }
    public function confirmCart(Request $request)
    {
        $validatedData = $request->validate([
            'payment_method' => 'required|string',
            
        ]);
        $payment_method = $validatedData['payment_method'];
        $userId = auth()->id();
        $cart = Cart::where('id_user', $userId)->where('status_konfirmasi', 0)->first();

        if ($cart) {
            // Menghitung total harga
            $totalHarga = ($cart->bag ? $cart->bag->price : 0) + 
                          ($cart->shoe ? $cart->shoe->price : 0) + 
                          ($cart->tent ? $cart->tent->price : 0);

            // Update status konfirmasi cart yang sudah ada
            $cart->update(['status_konfirmasi' => 1, 'total_harga' => $totalHarga, 'metode' => $payment_method]);

            // Ubah status barang yang di-checkout
            if ($cart->bag) {
                $cart->bag->update(['status' => 0]);
            }
            if ($cart->shoe) {
                $cart->shoe->update(['status' => 0]);
            }
            if ($cart->tent) {
                $cart->tent->update(['status' => 0]);
            }

            // Buat record cart baru dengan nilai default
            Cart::create([
                'bag_id' => 0,
                'shoe_id' => 0,
                'tent_id' => 0,
                'total_harga' => 0,
                'status_konfirmasi' => 0,
                'id_user' => $userId
            ]);
        } else {
            // Jika tidak ada cart aktif, buat yang baru
            Cart::create([
                'bag_id' => 0,
                'shoe_id' => 0,
                'tent_id' => 0,
                'total_harga' => 0,
                'status_konfirmasi' => 0,
                'id_user' => $userId
            ]);
        }

        return redirect()->back()->with('success', 'Cart confirmed and new cart created.');
    }
}
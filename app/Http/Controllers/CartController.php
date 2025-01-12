<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Pembayaran;
use App\Models\Pengiriman;

use Carbon\Carbon;
use Validator;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);

        $item = array(
            'id' => $product->id,
            'name' => $product->nama_produk,
            'price' => $product->harga,
            'quantity' => $request->quantity,
            'attributes' => [
                'gambar' => $product->gambar,
                'spesifikasi' => $product->spesifikasi
            ]
        );

        $cart = \Cart::add($item);

        return redirect()->route('product');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_kelamin' => 'required|string',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required|max:255',
            'alamat_pengiriman' => 'required|max:255',
            'metode_pengiriman' => 'required',
            'metode_pembayaran' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            // update user
            $user = User::find(auth()->user()->id);
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->no_telepon = $request->no_telepon;
            $user->alamat_rumah = $request->alamat;
            $user->save();

            // create order
            $order = new Order;
            $order->tanggal_pemesanan = Carbon::now();
            $order->total_harga = \Cart::getTotal();
            $order->user_id = auth()->user()->id;
            $order->status = 'pending';
            $order->save();

            // create order detail
            foreach(\Cart::getContent() as $item){
                $orderDetail = new OrderDetail;
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item->id;
                $orderDetail->nama_produk = $item->name;
                $orderDetail->harga_produk = $item->price;
                $orderDetail->quantity = $item->quantity;
                $orderDetail->subtotal = $item->getPriceSum();
                $orderDetail->save();
            }

            // create pembayaran
            $pembayaran = new Pembayaran;
            $pembayaran->order_id = $order->id;
            $pembayaran->jumlah_pembayaran = \Cart::getTotal();
            $pembayaran->status_pembayaran = 'pending';
            $pembayaran->metode_pembayaran = $request->metode_pembayaran;
            $pembayaran->save();

            // create pengiriman
            $pengiriman = new Pengiriman;
            $pengiriman->alamat_pengiriman = $request->alamat_pengiriman;
            $pengiriman->metode_pengiriman = $request->metode_pengiriman;
            $pengiriman->waktu_pengiriman = Carbon::now();
            $pengiriman->order_id = $order->id;
            $pengiriman->status_pengiriman = 'pending';
            $pengiriman->save();

            \Cart::clear();

            return redirect()->route('product')->with('success', 'Pemesanan Berhasil');
        }
    }
}

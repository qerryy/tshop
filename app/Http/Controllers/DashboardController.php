<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Trolley;
use Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Item::with('store')->latest()->get();
        return view('welcome', compact('items'));
    }

    public function show(Item $item)
    {
        return view('_product-overview', compact('item'));
    }

    public function addToCart(Item $item)
    {
        $item->stock -= 1;
        $item->save();

        Trolley::create([
            'item_id' => $item->id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Berhasil menambahkan ke keranjang.');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}

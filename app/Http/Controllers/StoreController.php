<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Item;

use Illuminate\Http\Request;
use Auth;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::with('user')->latest()->get();
        return view('stores.index', compact('stores'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Store $store)
    {
        return view('stores.show', compact('store'));
    }

    public function edit(Store $store)
    {
        //
    }

    public function update(Request $request, Store $store)
    {
        //
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()
            ->route('stores.index')
            ->with('success', 'Berhasil');
    }
}

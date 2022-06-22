<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Http\Request;
use Auth;
use Str;
use Storage;

class ItemController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'foto_barang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto_barang')) {
            $image = $request->foto_barang;
            $item_photo_path = Str::random(15).time().'.'.$image->getClientOriginalExtension();
            $request->file('foto_barang')->storeAs('public/foto_barang', $item_photo_path);
        }

        Item::create([
            'name' => $request->nama_barang,
            'price' => $request->harga,
            'stock' => $request->jumlah,
            'store_id' => Auth::user()->toko->id,
            'item_photo_path' => $item_photo_path,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Berhasil menambahkan barang.');
    }

    public function show(Item $item)
    {
        //
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'foto_barang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $item->update([
            'name' => $request->nama_barang,
            'price' => $request->harga,
            'stock' => $request->jumlah,
        ]);

        if ($request->hasFile('foto_barang')) {
            $old_photo_path = $item->item_photo_path;

            if (Storage::disk('public')->exists('foto_barang/'.$old_photo_path)) {
                Storage::disk('public')->delete('foto_barang/'.$old_photo_path);
            }

            $image = $request->foto_barang;
            $item_photo_path = Str::random(15).time().'.'.$image->getClientOriginalExtension();
            $request->file('foto_barang')->storeAs('public/foto_barang', $item_photo_path);
            $item->update(['item_photo_path' => $item_photo_path]);
        }

        return redirect()
            ->route('dashboard')
            ->with('success', 'Berhasil mengupdate barang.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()
            ->route('dashboard')
            ->with('success', 'Berhasil menghapus barang.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Trolley;
use Illuminate\Http\Request;

class TrolleyController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Trolley $trolley)
    {
        //
    }

    public function edit(Trolley $trolley)
    {
        return view('trolleys.edit', compact('trolley'));
    }

    public function update(Request $request, Trolley $trolley)
    {
        $request->validate([
            'uangku' => 'required|numeric',
        ]);

        if ($request->uangku < $trolley->item->price) {
            return back()->with('error', 'Uang tidak cukup.');
        }
        
        $trolley->update([
            'status' => 'lunas',
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Checkout Berhasil.');
    }

    public function destroy(Trolley $trolley)
    {
        $trolley->delete();
        return redirect()->route('dashboard')->with('success', 'Item berhasil dihapus.');
    }
}

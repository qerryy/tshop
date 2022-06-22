<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Str;
use Storage;

use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->with('roles')->latest()->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateInformation(Request $request, User $user)
    {
        $validData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.Auth::user()->id,
            'photo_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->hasFile('photo_profile')) {
            $old_photo_path = $user->profile_photo_path;

            if (Storage::disk('public')->exists('photo_profile/'.$old_photo_path)) {
                Storage::disk('public')->delete('photo_profile/'.$old_photo_path);
            }

            $image = $request->photo_profile;
            $profile_photo_path = Str::random(15).time().'.'.$image->getClientOriginalExtension();
            $request->file('photo_profile')->storeAs('public/photo_profile', $profile_photo_path);

            $user->update(['profile_photo_path' => $profile_photo_path]);
        }

        return back()->with('success', 'Berhasil mengupdate profile.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['string', new Password, 'confirmed'],
        ]);

        if (!isset($request['current_password']) || !Hash::check($request['current_password'], Auth::user()->password)){
            return back()->with('error-password', 'Kata sandi yang diberikan tidak cocok dengan kata sandi Anda saat ini.');
        }

        Auth::user()->update(['password' => Hash::make($request['password'])]);

        return back()->with('saved-password', 'Saved');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Berhasil menghapus user.');
    }
}

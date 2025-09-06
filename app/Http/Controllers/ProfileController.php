<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        //arahkan ke admin
        if($user->role === 'admin') {
            return view('admin.profile.edit', [
                'user' => $user,
            ]);
        }
        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $user = $request->user();

        // Cek apakah ada file KTP yang diunggah
        if ($request->hasFile('up_ktp')) {
            // Hapus KTP lama jika ada
            if ($user->up_ktp) {
                Storage::disk('public')->delete($user->up_ktp);
            }

            // Simpan KTP baru
            $path = $request->file('up_ktp')->store('ktp_file', 'public');
            $validatedData['up_ktp'] = $path;
        }

        $user->fill($validatedData);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Hapus KTP dari storage sebelum user dihapus
        if ($user->up_ktp) {
            Storage::disk('public')->delete($user->up_ktp);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

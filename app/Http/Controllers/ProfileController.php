<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{

    public function index(Request $request): View
    {

        return view('profile.index', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with(
            'status',
            [
                'icon' => 'success',
                'text' => 'profile-updated'
            ]
        );
    }

    public function updatePassword(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Password::defaults()],
            // 'password_confirmation' => 'required'
        ]);

        if (!Hash::check($validated['current_password'], $request->user()->password)) {
            return back()->with('status', [
                'icon' => 'error',
                'text' => 'password-not-match'
            ]);
        }

        $validated['password'] = Hash::make($validated['password']);
        unset($validated['current_password']);

        $request->user()->update($validated);

        return Redirect::route('profile.edit')->with(
            'status',
            [
                'icon' => 'success',
                'text' => 'password-updated'
            ]
        );
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

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    /**
     * Tampilkan semua membership
     */
    public function index()
    {
        $memberships = Membership::all();
        return view('memberships.index', compact('memberships'));
    }

    /**
     * User join membership
     */
    public function join($id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $membership = Membership::findOrFail($id);

        // Pakai helper model User untuk activate membership
        $user->activateMembership($membership);

        return redirect()->route('dashboard')->with('success', 'Membership aktif!');
    }
}

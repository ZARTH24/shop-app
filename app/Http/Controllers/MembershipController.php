<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return view('memberships.index', compact('memberships'));
    }

    public function join($id)
    {   
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $membership = Membership::findOrFail($id);

        // Pakai helper model untuk update pivot + user
        $user->activateMembership($membership);

        return redirect()->route('dashboard')->with('success', 'Membership aktif!');
    }
}

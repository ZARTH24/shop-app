<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use Carbon\Carbon;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return view('membership.index', compact('memberships'));
    }

     public function activate(Request $request)
    {
        $user = $request->user();

        if ($user->is_member) {
            return back()->with('error', 'Kamu udah member, jangan sok daftar ulang.');
        }

        // Anggap pembayaran udah dilakukan
        $user->is_member = true;
        $user->member_since = Carbon::now();
        $user->save();

        return redirect()->route('membership.index')
            ->with('success', 'Selamat, kamu resmi jadi member seumur hidup.');
    }
}

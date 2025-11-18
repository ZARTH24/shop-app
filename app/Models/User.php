<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use App\Models\Membership;
use App\Models\Cart;
use App\Models\Order;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'is_member',
        'member_until',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_member' => 'boolean',
        'member_until' => 'datetime',
    ];

    // RELASI MEMBERSHIP
    public function memberships()
    {
        return $this->belongsToMany(Membership::class, 'user_memberships')
                    ->withPivot('start_at', 'end_at')
                    ->withTimestamps();
    }

    // RELASI CART
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // RELASI ORDER
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // MEMBERSHIP AKTIF
    public function activeMembership()
    {
        return $this->memberships()
                    ->wherePivot('end_at', '>=', now())
                    ->first();
    }

    // CEK STATUS MEMBER
    public function isActiveMember()
    {
        return $this->activeMembership() !== null;
    }

    // AKTIFKAN MEMBERSHIP
    public function activateMembership(Membership $membership)
    {
        $start = now();
        $end = $start->copy()->addDays($membership->duration_days);

        $this->memberships()->attach($membership->id, [
            'start_at' => $start,
            'end_at' => $end,
        ]);

        $this->update([
            'is_member' => true,
            'member_until' => $end,
        ]);

        return $this;
    }

    // PERPANJANG MEMBERSHIP
    public function extendMembership($days)
    {
        $active = $this->activeMembership();
        if ($active) {
            $newEnd = Carbon::parse($active->pivot->end_at)->addDays($days);

            $this->memberships()->updateExistingPivot($active->id, [
                'end_at' => $newEnd,
            ]);

            $this->update([
                'member_until' => $newEnd,
            ]);
        }

        return $this;
    }
}

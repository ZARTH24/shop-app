<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use App\Models\Membership;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Mass assignable attributes
     */
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

    /**
     * Hidden attributes for serialization
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_member' => 'boolean',
        'member_until' => 'datetime',
    ];

    /**
     * Relasi ke memberships
     */
    public function memberships()
    {
        return $this->belongsToMany(Membership::class, 'user_memberships')
                    ->withPivot('start_at', 'end_at')
                    ->withTimestamps();
    }

    /**
     * Relasi ke cart
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Relasi ke orders
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Ambil membership aktif
     */
    public function activeMembership()
    {
        return $this->memberships()
                    ->wherePivot('end_at', '>=', now())
                    ->first();
    }

    /**
     * Cek apakah user saat ini member aktif
     */
    public function isActiveMember()
    {
        return $this->activeMembership() !== null;
    }

    /**
     * Activate membership untuk user
     */
    /**
 * Activate membership untuk user
 */
public function activateMembership(Membership $membership)
{
    $start = now();
    $end = $start->copy()->addDays($membership->duration_days);

    // Tambahkan ke pivot table
    $this->memberships()->attach($membership->id, [
        'start_at' => $start,
        'end_at' => $end,
    ]);

    // Update kolom di tabel users
    $this->update([
        'is_member' => 1,
        'member_until' => $end,
    ]);

    return $this;
}


    /**
     * Extend membership aktif (opsional)
     */
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

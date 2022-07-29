<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'nim',
        'name',
        'email',
        'password',
        'roles_id',
        'miniclass_id',
        'generation_id',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsTo(Roles::class);
    }

    public function presence()
    {
        return $this->hasMany(Presence::class, 'nim', 'nim');
    }

    public function hadir()
    {
        return $this->presence()->where('status', 'Hadir')->orderBy('id', 'desc');
    }

    public function izin()
    {
        return $this->presence()->where('status', 'Izin')->orderBy('id', 'desc');
    }

    public function sakit()
    {
        return $this->presence()->where('status', 'Sakit')->orderBy('id', 'desc');
    }

    public function alpha()
    {
        return $this->presence()->where('status', 'Alpha')->orderBy('id', 'desc');
    }

    public function getRouteKeyName() 
    {
        return 'nim';
    }
}

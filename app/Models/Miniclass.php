<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miniclass extends Model
{
    use HasFactory;
    protected $fillable = ['miniclass_name'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function meeting()
    {
        return $this->hasMany(Meetings::class);
    }

    public function presence()
    {
        return $this->hasManyThrough(Presence::class, Meetings::class);
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
}

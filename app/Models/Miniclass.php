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
}

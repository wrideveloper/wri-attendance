<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;
    protected $table='generations';
    protected $fillable=['crew_name'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}

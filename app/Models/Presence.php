<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model {
    use HasFactory;

    protected $table = 'presences';
    protected $guarded = ['id'];
    protected $fillable = [
        'meetings_id',
        'nim',
        'presence_date',
        'status',
        'ket',
        'feedback',
        'token',
    ];

    protected $with = [
        'user'
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function ($query, $search){
            return $query->whereHas('user', function ($query) use ($search){
                $query->where('nim', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
            });
        });
    }

    public function getRouteKeyName() {
        return 'nim';
    }

    public function meetings() {
        return $this->hasMany(Meetings::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'nim', 'nim');
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presence extends Model {
    use HasFactory;

    protected $table = 'presences';
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'meetings_id',
    //     'nim',
    //     'presence_date',
    //     'status',
    //     'ket',
    //     'token',
    //     'feedback',
    //     'created_at',
    //     'updated_at'
    // ];

    protected $with = ['meetings', 'user'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function ($query, $search){
            return $query->whereHas('user', function ($query) use ($search){
                $query->where('nim', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
            })
            ->orWhereHas('meetings', function ($query) use ($search){
                $query->where('topik', 'like', "%{$search}%")
                    ->orWhere('pertemuan', 'like', "%{$search}%")
                    ->orWhere('tanggal', 'like', "%{$search}%");
            });
        });
    }

    public function getRouteKeyName() {
        return 'nim';
    }

    public function meetings() {
        return $this->belongsTo(Meetings::class);
    }

    // public function meeting() {
    //     return $this->belongsTo(Meetings::class);
    // }

    public function user() {
        return $this->belongsTo(User::class, 'nim', 'nim');
    }
}

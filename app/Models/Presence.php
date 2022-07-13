<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model {
    use HasFactory;

    protected $table = 'presences';
    protected $fillable = [
        'miniclass_meetings_id',
        'user_id',
        'presence_date',
        'status',
        'ket',
        'feedback'
    ];

    protected $with = [
        'meetings',
        'user'
    ];

    public function getRouteKeyName() {
        return 'nim';
    }

    public function meetings() {
        return $this->belongsTo(Meetings::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

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
        'miniclass_meetings',
        'user'
    ];

    public function getRouteKeyName() {
        return 'nim';
    }

    public function miniclass_meetings() {
        return $this->belongsTo('App\Models\MiniclassMeeting');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}

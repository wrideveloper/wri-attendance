<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    use HasFactory;
    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'miniclass_id',
        'topik',
        'tanggal',
        'start_time',
        'end_time',
        'pertemuan',
        'token'
    ];
    protected $with = 'presence';

    public function getRouteKeyName() {
        return 'token';
    }

    public function presence()
    {
        return $this->belongsTo(Presence::class);
    }
    public function miniclass()
    {
        return $this->belongsTo(Miniclass::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $table = 'membership';

    protected $fillable = [
        'tglbuat',
        'tglkadaluwarsa',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

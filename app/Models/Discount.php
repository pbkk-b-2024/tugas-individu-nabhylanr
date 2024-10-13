<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discount';

    protected $fillable = [
        'kode_diskon',
        'nilai_diskon',
        'tipe_diskon',
    ];

    public function getNilaiDiskonAttribute($value)
    {
        return $value . '%';
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'menu_id', 
        'quantity', 
        'status'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function payment()
	{
		return $this->belongsTo(Payment::class, 'id_payment');
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table='wallet';
    protected $fillable=['option','monto','description','user_id'];
    protected $with=['user'];

    public function user()
    {
    	$this->belongsTo('App\Models\User','user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table='wallets';
    protected $fillable=['option','monto','description','premise_id','status'];
    // protected $with=['premise'];

    public function premise()
    {
    	$this->belongsTo('App\Models\Premises','premise_id');
    }
}

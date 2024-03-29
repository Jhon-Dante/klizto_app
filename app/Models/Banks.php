<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    use HasFactory;

    protected $table='banks';
    protected $fillable=['name','status'];

    public function user()
    {
    	return $this->HasMany('App\Models\User','bank_id');
    }
    public function client()
    {
    	return $this->HasMany('App\Models\Clients','bank_id');
    }
}

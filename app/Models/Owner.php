<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $table='owners';
    protected $fillable=['name','last_name','phone','email'];

    public function premises()
    {
    	return $this->HasMany('App\Models\Premises','owner_id');
    }
}

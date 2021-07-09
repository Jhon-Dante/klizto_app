<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    use HasFactory;

    protected $table='levels';
    protected $fillable=['name','code'];

    const ADMIN = 1;
	const EMPLOYED = 2;
	const BUYER = 3;
	const CLIENT = 4;
    const OWNER = 5;

    public function user()
    {
    	return $this->hasMany('App\Models\Levels','level_id');
    }
}

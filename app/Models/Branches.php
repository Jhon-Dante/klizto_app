<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;

    protected $table='branches';
    protected $fillable=['direction','phone','premise_id','status','principal'];

    public function premise()
    {
    	return $this->belongsTo('App\Models\Premises','premise_id');
    }
}

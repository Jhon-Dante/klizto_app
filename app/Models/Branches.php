<?php

namespace App\Models;
use App\Models\Employees;

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

    public function employees()
    {
    	return $this->belongsToMany(Employees::class);
    }
}

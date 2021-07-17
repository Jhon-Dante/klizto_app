<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table='clients';
    protected $fillable=['name',,'user_id','count_bank','bank_id'];
    protected $with=['user','bank'];

    public function user()
    {
    	return $this->belongsTo('App\Models\user','user_id');
    }

    public function bank()
    {
    	return $this->belongsTo('App\Models\Banks','bank_id');
    }
}

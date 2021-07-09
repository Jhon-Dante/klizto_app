<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table='services';
    protected $fillable=['name','description','category_id','status'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Categories','category_id');
    }
    public function user()
    {
        return $this->HasMany('App\Models\User','services_id');
    }

}

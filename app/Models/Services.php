<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table='services';
    protected $fillable=['name','description','category_id','status'];
    protected $with=['category'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Categories','category_id');
    }

}

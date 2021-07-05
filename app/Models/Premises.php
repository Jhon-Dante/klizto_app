<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premises extends Model
{
    use HasFactory;

    protected $table='premises';
    protected $fillable=['nombre, category_id, subcategory_id, user_id','status'];
    protected $wit=['category','subcategory','user'];

    public function category()
    {
    	$this->belongsTo('App\Models\Categories','category_id');
    }

    public function subcategory()
    {
    	$this->belongsTo('App\Models\SubCategories','subcategory_id');
    }

    public function user()
    {
    	$this->belongsTo('App\Models\User','user_id');
    }
}

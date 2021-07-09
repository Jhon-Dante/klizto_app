<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;

    protected $table='subcategories';
    protected $fillable=['name','category_id','status'];
    protected $with=['category'];

    public function category()
    {
    	$this->belongTo('App\Models\Categories','category_id');
    }
    
    public function service()
    {
    	$this->HasMany('App\Models\Services','category_id');
    }
}

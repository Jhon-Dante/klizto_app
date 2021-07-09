<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $fillable=['name','image','status'];

    public function subcategory()
    {
    	$this->HasMany('App\Models\SubCategories','category_id');
    }

    public function service()
    {
    	$this->HasMany('App\Models\Services','category_id');
    }
}

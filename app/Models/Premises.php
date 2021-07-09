<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premises extends Model
{
    use HasFactory;

    protected $table='premises';
    protected $fillable=['nombre', 'user_id','status','services_id','count_bank','bank_id'];
    protected $with=['services_id','bank','user'];

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
    public function bank()
    {
        $this->belongsTo('App\Models\Banks','bank_id');
    }
}

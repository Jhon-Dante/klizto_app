<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    use HasFactory;

    protected $table='publications';
    protected $fillable=['premise_id','img','date_ac_start','date_ac_end','category_id','service_id','employee_id','title','price','discount','description1','description2','description3','description4','status'];
    protected $with=['category','service','employee','premise'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Categories','category_id');
    }
    public function service()
    {
    	return $this->belongsTo('App\Models\Services','service_id');
    }
    public function employee()
    {
    	return $this->belongsTo('App\Models\Employees','employee_id');
    }
    public function premise()
    {
    	return $this->belongsTo('App\Models\Premises','premise_id');
    }
}

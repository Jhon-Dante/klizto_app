<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;

class Publications extends Model
{
    use HasFactory;

    protected $table='publications';
    protected $fillable=['premise_id','img','code','date_ac_start','date_ac_end','category_id','title','price','discount','description','status'];

    protected $with=['category','employess','premise','images','descriptions'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Categories','category_id');
    }
    public function services()
    {
    	return $this->hasMany('App\Models\PublicationsImages','publications_id');
    }
    public function employess()
    {
    	return $this->belongsToMany(Employees::class)->withPivot('employees_id');
    }
    public function premise()
    {
    	return $this->belongsTo('App\Models\Premises','premise_id');
    }
    public function images()
    {
        return $this->hasMany('App\Models\PublicationsImages','publications_id');
    }
    public function descriptions()
    {
        return $this->hasMany('App\Models\PublicationsDescriptions','publications_id');
    }
}

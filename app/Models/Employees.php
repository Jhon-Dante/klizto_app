<?php

namespace App\Models;
use App\Models\Branches;
use App\Models\Employees;
use App\Models\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $table='employees';
    protected $fillable=['name','age','description','gender'];
    // protected $with=['branches'];

    public function branches()
    {
    	return $this->belongsToMany(Branches::class)->withPivot('branches_id');
    }

    public function services()
    {
    	return $this->belongsToMany(Services::class);
    }

    public function publication()
    {
        $this->HasMany('App\Models\Publications','employee_id');
    }
}

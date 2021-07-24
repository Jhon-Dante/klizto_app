<?php

namespace App\Models;
use App\Models\Branches;
use App\Models\Employees;
use App\Models\Services;
use App\Models\Publications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $table='employees';
    protected $fillable=['name','last_name'];
    protected $with=['services','branches'];

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
        return $this->belongsToMany(Publications::class)->withPivot('publications_id');
    }
}

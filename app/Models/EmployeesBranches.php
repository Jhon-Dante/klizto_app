<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesBranches extends Model
{
    use HasFactory;

    protected $table="branch_employee";
    protected $fillable=['branches_id','employees_id'];
    protected $with=['employees','branches'];

    public function employees()
    {
    	return $this->belongsTo('App\Models\Employees','employees_id');
    }

    public function branches()
    {
    	return $this->belongsTo('App\Models\branches','branches_id');
    }

}

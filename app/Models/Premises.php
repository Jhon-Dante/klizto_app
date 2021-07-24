<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premises extends Model
{
    use HasFactory;

    protected $table='premises';
    protected $fillable=['user_id','profile','count_bank','bank_id','owner_id','status'];
    protected $with=['bank','owner'];

    public function owner()
    {
    	return $this->belongsTo('App\Models\Owner','owner_id');
    }
    public function bank()
    {
        return $this->belongsTo('App\Models\Banks','bank_id');
    }
    public function wallet()
    {
        return $this->HasMany('App\Models\Wallet','premise_id');
    }

    public function branches()
    {
        return $this->HasMany('App\Models\Branches','premise_id');
    }
       public function publication()
    {
        $this->HasMany('App\Models\Publications','premise_id');
    }
}

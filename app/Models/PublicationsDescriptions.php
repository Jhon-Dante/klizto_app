<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationsDescriptions extends Model
{
    use HasFactory;

    protected $table='publications_descriptions';
    protected $fillable=['publications_id','description','status'];

    public function publication()
    {
    	return $this->belongsTo('App\Models\Publications','publications_id');
    }
}

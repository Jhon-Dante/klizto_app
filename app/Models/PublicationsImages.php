<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationsImages extends Model
{
    use HasFactory;

    protected $table='publications_images';
    protected $fillable=['publications_id','url','image','type','status'];

    public function publication()
    {
    	return $this->belongsTo('App\Models\Publications','publications_id');
    }
}

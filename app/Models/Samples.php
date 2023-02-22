<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Samples extends Model
{
    protected $guarded = [];


    //Relation Informants With Samples
    public function Informants()
    {
        return $this->belongsTo('App\Models\Informants', 'informants_id');
    }


    //Relation Classes With Samples
    public function Classes()
    {
        return $this->belongsTo('App\Models\Classes', 'classes_id');
    }
}

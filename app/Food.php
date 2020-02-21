<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $table='foods';
    //primarykey
    public $primaryKey ='id';
    //timestamps
    public $timestamps = true;

}

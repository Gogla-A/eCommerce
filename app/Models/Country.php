<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = ['name'];
    protected $hidden = ['id'];
    public $timestamps = false;

    public function doctors(){
        return $this -> hasManyThrough('App\Models\Doctor', 'App\Models\Hospital', 'country_id','hospital_id','id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';
    protected $fillable = ['code', 'phone', 'user_id'];
    protected $hidden = ['user_id'];
    public $timestamps = false;

    ###################### Start Relations #####################
    public function user()
    {
        return $this-> belongsTo('App\Models\User', 'user_id');
    }

    ###################### End Relations #####################

}

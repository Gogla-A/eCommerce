<?php

namespace App\Models;

use App\Scopes\OfferScope;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = [
        'name',
        'details',
        'price',
        'photo',
        'created_at',
        'updated_at'
    ];
    protected $hidden = ['created_at','updated_at'];

    public function scopeInactive($q){
        return $q -> where('status',0);
    }
    public function scopeInvalid($q){
        return $q -> where('status',0) -> whereNull('details');
    }

    protected static function booted() {
//        parent::boot();
        static::addGlobalScope(new OfferScope);
    }
}

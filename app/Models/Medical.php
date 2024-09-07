<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    protected $table = 'medicals';
    protected $fillable = ['id', 'pdf', 'patient_id'];
    protected $hidden = ['id'];
    public $timestamps = false;
}

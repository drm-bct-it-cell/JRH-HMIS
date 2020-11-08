<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $table = 'doctor_master';
    public $primaryKey = 'doctor_id';
    public $timestamps = false;

    protected $fillable = [
        'Name','Designation','Department','total_patient','email','time_per_patient','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','timing','count'
    ];

}
